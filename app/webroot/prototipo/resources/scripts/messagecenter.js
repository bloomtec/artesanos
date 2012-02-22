if (typeof console == 'undefined') console = {
    log: function () { }
};

// sniff chrome
var CHROME_5_LOCAL = false;
(function () {
    var regex = /Chrome\/([0-9]+).([0-9]+)/g
    var match = regex.exec(navigator.userAgent);
    CHROME_5_LOCAL = match &&
                Number(match[1]) >= 5 &&
                location.href.indexOf('file://') >= 0;
})();


(function() {
    var _messageCenter = {};
    var _listeners = [];
    var _stateListeners = [];
    var _state = {};
    var _eventObject = null;

    var _queuedMessages = [];
    var _initialized = false;

    // this is for the non Chrome 5 local scenarios. The "top" message center will dispatch to all the bottom ones
    var _childrenMessageCenters = [];

    // create $axure if it hasn't been created
    if (typeof $axure == 'undefined') $axure = function() {};
    $axure.messageCenter = _messageCenter;

    $(document).ready(function() {
        if (CHROME_5_LOCAL) {
            $('body').append("<div id='axureEventReceiverDiv' style='display:none'></div>" +
                "<div id='axureEventSenderDiv' style='display:none'></div>");

		    _eventObject = document.createEvent('Event');
		    _eventObject.initEvent('axureMessageSenderEvent', true, true);            
            
            $('#axureEventReceiverDiv').bind('axureMessageReceiverEvent', function () {
                var request = JSON.parse($(this).text());
                _handleRequest(request);
            });
        } else {
            var topMessageCenter = top.$axure.messageCenter;
            if (topMessageCenter != _messageCenter) {
                topMessageCenter.addChildMessageCenter(_messageCenter);
                console.log('adding from ' + window.location.toString());
            }
        }
    });

    var _handleRequest = function (request) {
        // route the request to all the listeners
        for(var i = 0; i < _listeners.length; i++) _listeners[i](request.message, request.data);

        // now handle the queued messages if we're initializing
        if (request.message == 'initialize') {
            _initialized = true;
            // send all the queued messages and return
            for (var i = 0; i < _queuedMessages.length; i++) {
                var qRequest = _queuedMessages[i];
                _messageCenter.postMessage(qRequest.message, qRequest.data);
            }
            _queuedMessages = [];
        }
                
        // and then handle the set state messages, if necessary
        if (request.message == 'setState') {
            _state[request.data.key] = request.data.value;
            for (var i = 0; i < _stateListeners.length; i++) {
                var keyListener = _stateListeners[i];
                // if thep passed a null or empty value, always post the message
                if (!keyListener.key || keyListener.key == request.data.key) {
                    keyListener.listener(request.data.key, request.data.value);
                }
            }
        }

    };

    // -----------------------------------------------------------------------------------------
    // This method allows for dispatching messages in the non-chromelocal scenario.
    // Each child calls this on top.$axure.messageCenter
    // -----------------------------------------------------------------------------------------
    _messageCenter.addChildMessageCenter = function(messageCenter) {
        _childrenMessageCenters[_childrenMessageCenters.length] = messageCenter;
    };

    // -----------------------------------------------------------------------------------------
    // This method allows for dispatching messages in the non-chromelocal scenario.
    // Each child calls this on top.$axure.messageCenter
    // -----------------------------------------------------------------------------------------
    _messageCenter.dispatchMessage = function(message, data) {
        _handleRequest({
            message: message,
            data: data
        });
    };

    // -----------------------------------------------------------------------------------------
    // -----------------------------------------------------------------------------------------
    _messageCenter.dispatchMessageRecursively = function(message, data) {
        console.log("dispatched to " + window.location.toString());

        // dispatch to the top center first
        _messageCenter.dispatchMessage(message, data);

        $('iframe').each(function(index, frame) {
            if (frame.contentWindow.$axure && frame.contentWindow.$axure.messageCenter) {
                frame.contentWindow.$axure.messageCenter.dispatchMessageRecursively(message, data);
            }
        });
    };

    _messageCenter.postMessage = function (message, data) {
        if (!CHROME_5_LOCAL) {
            top.$axure.messageCenter.dispatchMessageRecursively(message, data);
        } else {
            var request = {
                message : message,
                data : data
            };
   
            if (_initialized) {
                var senderDiv = document.getElementById('axureEventSenderDiv');
                var messageText = JSON.stringify(request);
                console.log('sending event: ' + messageText);
                senderDiv.innerText = messageText;
                senderDiv.dispatchEvent(_eventObject);
                console.log('event sent');
            } else {
                _queuedMessages[_queuedMessages.length] = request;
            }
        }
    }

    _messageCenter.setState = function(key, value) {
        var data = {
            key : key,
            value : value
        };
        _messageCenter.postMessage('setState', data);
    }

    _messageCenter.getState = function(key) {
        return _state[key];
    }

    _messageCenter.addMessageListener = function(listener) {
        _listeners[_listeners.length] = listener;
    }

    _messageCenter.addStateListener = function(key, listener) {
        _stateListeners[_stateListeners.length] = {
            key: key,
            listener: listener
        };
    }

})();