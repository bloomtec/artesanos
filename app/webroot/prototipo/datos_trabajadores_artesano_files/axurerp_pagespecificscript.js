
var PageName = 'datos trabajadores artesano';
var PageId = '68c331b16c914c26baacc9b8ce091e55'
var PageUrl = 'datos_trabajadores_artesano.html'
document.title = 'datos trabajadores artesano';
var PageNotes = 
{
"pageName":"datos trabajadores artesano",
"showNotesNames":"False",
"Default":"<p style=\"text-align:left;\"><span style=\"\">Se elimino el campo de calificación de está opción ya que la calificación se hará despues de la inspección y solo la hará el inspector<\/span><\/p>",
"validaciones":"<p style=\"text-align:left;\"><span style=\"\">El capital de inversión máxima es la suma de Maquinaria y Herramientas, Materia Prima en Stock y los Productos Elaborados en Stock, estos campos se basan en las cantidades que se poseen al momento de la inspección.<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">&nbsp;<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">&nbsp;<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">No se puede tener mas de 15 operarios<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">No se puede tener mas&nbsp; de 5 aprendices<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">&nbsp;<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">La Rentabilidad es la resta de Ingresos menos Egresos. La Rentabilidad no debe ser menor al salario básico unificado.<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">&nbsp;<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">&nbsp;<\/span><\/p>"}
var $OnLoadVariable = '';

var $CSUM;

var hasQuery = false;
var query = window.location.hash.substring(1);
if (query.length > 0) hasQuery = true;
var vars = query.split("&");
for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    if (pair[0].length > 0) eval("$" + pair[0] + " = decodeURIComponent(pair[1]);");
} 

if (hasQuery && $CSUM != 1) {
alert('Prototype Warning: The variable values were too long to pass to this page.\nIf you are using IE, using Firefox will support more data.');
}

function GetQuerystring() {
    return '#OnLoadVariable=' + encodeURIComponent($OnLoadVariable) + '&CSUM=1';
}

function PopulateVariables(value) {
    var d = new Date();
  value = value.replace(/\[\[OnLoadVariable\]\]/g, $OnLoadVariable);
  value = value.replace(/\[\[PageName\]\]/g, PageName);
  value = value.replace(/\[\[GenDay\]\]/g, '6');
  value = value.replace(/\[\[GenMonth\]\]/g, '2');
  value = value.replace(/\[\[GenMonthName\]\]/g, 'febrero');
  value = value.replace(/\[\[GenDayOfWeek\]\]/g, 'lunes');
  value = value.replace(/\[\[GenYear\]\]/g, '2012');
  value = value.replace(/\[\[Day\]\]/g, d.getDate());
  value = value.replace(/\[\[Month\]\]/g, d.getMonth() + 1);
  value = value.replace(/\[\[MonthName\]\]/g, GetMonthString(d.getMonth()));
  value = value.replace(/\[\[DayOfWeek\]\]/g, GetDayString(d.getDay()));
  value = value.replace(/\[\[Year\]\]/g, d.getFullYear());
  return value;
}

function OnLoad(e) {

}

widgetIdToHideFunction['u332'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u335','','none',500);

}

}
widgetIdToHideFunction['u143'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u146','','none',500);

}

}
widgetIdToHideFunction['u380'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u383','','none',500);

}

}
widgetIdToHideFunction['u167'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u170','','none',500);

}

}
widgetIdToHideFunction['u340'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u343','','none',500);

}

}
widgetIdToHideFunction['u103'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u106','','none',500);

}

}
widgetIdToHideFunction['u199'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u202','','none',500);

}

}
widgetIdToHideFunction['u356'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u359','','none',500);

}

}
widgetIdToHideFunction['u111'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u114','','none',500);

}

}
widgetIdToHideFunction['u316'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u319','','none',500);

}

}
widgetIdToHideFunction['u372'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u375','','none',500);

}

}
widgetIdToHideFunction['u175'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u178','','none',500);

}

}
widgetIdToHideFunction['u364'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u367','','none',500);

}

}
widgetIdToHideFunction['u183'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u186','','none',500);

}

}
widgetIdToHideFunction['u324'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u327','','none',500);

}

}
widgetIdToHideFunction['u215'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u218','','none',500);

}

}
widgetIdToHideFunction['u348'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u351','','none',500);

}

}
widgetIdToHideFunction['u135'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u138','','none',500);

}

}
widgetIdToHideFunction['u191'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u194','','none',500);

}

}
widgetIdToHideFunction['u151'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u154','','none',500);

}

}
widgetIdToHideFunction['u159'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u162','','none',500);

}

}
widgetIdToHideFunction['u308'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u311','','none',500);

}

}
widgetIdToHideFunction['u207'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u210','','none',500);

}

}
widgetIdToHideFunction['u119'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u122','','none',500);

}

}
widgetIdToHideFunction['u127'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u130','','none',500);

}

}
var u370 = document.getElementById('u370');
gv_vAlignTable['u370'] = 'top';
var u167 = document.getElementById('u167');

var u299 = document.getElementById('u299');

var u36 = document.getElementById('u36');

var u180 = document.getElementById('u180');
gv_vAlignTable['u180'] = 'center';
var u400 = document.getElementById('u400');

var u216 = document.getElementById('u216');

u216.style.cursor = 'pointer';
if (bIE) u216.attachEvent("onclick", Clicku216);
else u216.addEventListener("click", Clicku216, true);
function Clicku216(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u215','hidden','fade',500);

}

}

var u194 = document.getElementById('u194');

var u72 = document.getElementById('u72');

var u333 = document.getElementById('u333');

u333.style.cursor = 'pointer';
if (bIE) u333.attachEvent("onclick", Clicku333);
else u333.addEventListener("click", Clicku333, true);
function Clicku333(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u332','hidden','fade',500);

}

}

var u97 = document.getElementById('u97');
gv_vAlignTable['u97'] = 'top';
var u152 = document.getElementById('u152');

u152.style.cursor = 'pointer';
if (bIE) u152.attachEvent("onclick", Clicku152);
else u152.addEventListener("click", Clicku152, true);
function Clicku152(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u151','hidden','fade',500);

}

}

var u231 = document.getElementById('u231');
gv_vAlignTable['u231'] = 'center';
var u60 = document.getElementById('u60');
gv_vAlignTable['u60'] = 'top';
var u78 = document.getElementById('u78');

var u166 = document.getElementById('u166');

if (bIE) u166.attachEvent("onfocus", Focusu166);
else u166.addEventListener("focus", Focusu166, true);
function Focusu166(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u167','','fade',500);

}

}

var u298 = document.getElementById('u298');
gv_vAlignTable['u298'] = 'top';
var u139 = document.getElementById('u139');

var u201 = document.getElementById('u201');
gv_vAlignTable['u201'] = 'center';
var u1 = document.getElementById('u1');
gv_vAlignTable['u1'] = 'center';
var u215 = document.getElementById('u215');

var u193 = document.getElementById('u193');
gv_vAlignTable['u193'] = 'center';
var u11 = document.getElementById('u11');

var u126 = document.getElementById('u126');

if (bIE) u126.attachEvent("onfocus", Focusu126);
else u126.addEventListener("focus", Focusu126, true);
function Focusu126(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u127','','fade',500);

}

}

var u413 = document.getElementById('u413');

u413.style.cursor = 'pointer';
if (bIE) u413.attachEvent("onclick", Clicku413);
else u413.addEventListener("click", Clicku413, true);
function Clicku413(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u412','hidden','none',500);

}

}

var u332 = document.getElementById('u332');

var u151 = document.getElementById('u151');

var u202 = document.getElementById('u202');

var u26 = document.getElementById('u26');

var u389 = document.getElementById('u389');

var u165 = document.getElementById('u165');
gv_vAlignTable['u165'] = 'top';
var u378 = document.getElementById('u378');
gv_vAlignTable['u378'] = 'top';
var u138 = document.getElementById('u138');

var u100 = document.getElementById('u100');

var u54 = document.getElementById('u54');
gv_vAlignTable['u54'] = 'top';
var u236 = document.getElementById('u236');

var u214 = document.getElementById('u214');

if (bIE) u214.attachEvent("onfocus", Focusu214);
else u214.addEventListener("focus", Focusu214, true);
function Focusu214(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u215','','fade',500);

}

}

var u192 = document.getElementById('u192');

u192.style.cursor = 'pointer';
if (bIE) u192.attachEvent("onclick", Clicku192);
else u192.addEventListener("click", Clicku192, true);
function Clicku192(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u191','hidden','fade',500);

}

}

var u67 = document.getElementById('u67');

var u269 = document.getElementById('u269');
gv_vAlignTable['u269'] = 'top';
var u331 = document.getElementById('u331');

if (bIE) u331.attachEvent("onfocus", Focusu331);
else u331.addEventListener("focus", Focusu331, true);
function Focusu331(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u332','','fade',500);

}

}

var u321 = document.getElementById('u321');
gv_vAlignTable['u321'] = 'center';
var u150 = document.getElementById('u150');

if (bIE) u150.attachEvent("onfocus", Focusu150);
else u150.addEventListener("focus", Focusu150, true);
function Focusu150(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u151','','fade',500);

}

}

var u287 = document.getElementById('u287');

var u48 = document.getElementById('u48');

var u327 = document.getElementById('u327');

var u340 = document.getElementById('u340');

var u24 = document.getElementById('u24');

var u80 = document.getElementById('u80');
gv_vAlignTable['u80'] = 'top';
var u65 = document.getElementById('u65');

var u346 = document.getElementById('u346');
gv_vAlignTable['u346'] = 'top';
var u318 = document.getElementById('u318');
gv_vAlignTable['u318'] = 'center';
var u365 = document.getElementById('u365');

u365.style.cursor = 'pointer';
if (bIE) u365.attachEvent("onclick", Clicku365);
else u365.addEventListener("click", Clicku365, true);
function Clicku365(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u364','hidden','fade',500);

}

}

var u113 = document.getElementById('u113');
gv_vAlignTable['u113'] = 'center';
var u268 = document.getElementById('u268');
gv_vAlignTable['u268'] = 'top';
var u330 = document.getElementById('u330');
gv_vAlignTable['u330'] = 'top';
var u227 = document.getElementById('u227');
gv_vAlignTable['u227'] = 'center';
var u42 = document.getElementById('u42');
gv_vAlignTable['u42'] = 'top';
var u159 = document.getElementById('u159');

var u163 = document.getElementById('u163');

var u63 = document.getElementById('u63');
gv_vAlignTable['u63'] = 'top';
var u326 = document.getElementById('u326');
gv_vAlignTable['u326'] = 'center';
var u177 = document.getElementById('u177');
gv_vAlignTable['u177'] = 'center';
var u37 = document.getElementById('u37');
gv_vAlignTable['u37'] = 'top';
var u93 = document.getElementById('u93');
gv_vAlignTable['u93'] = 'top';
var u112 = document.getElementById('u112');

u112.style.cursor = 'pointer';
if (bIE) u112.attachEvent("onclick", Clicku112);
else u112.addEventListener("click", Clicku112, true);
function Clicku112(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u111','hidden','fade',500);

}

}

var u46 = document.getElementById('u46');

var u307 = document.getElementById('u307');

if (bIE) u307.attachEvent("onfocus", Focusu307);
else u307.addEventListener("focus", Focusu307, true);
function Focusu307(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u308','','fade',500);

}

}

var u285 = document.getElementById('u285');

var u18 = document.getElementById('u18');

var u50 = document.getElementById('u50');

var u74 = document.getElementById('u74');

var u162 = document.getElementById('u162');

var u357 = document.getElementById('u357');

u357.style.cursor = 'pointer';
if (bIE) u357.attachEvent("onclick", Clicku357);
else u357.addEventListener("click", Clicku357, true);
function Clicku357(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u356','hidden','fade',500);

}

}

var u79 = document.getElementById('u79');
gv_vAlignTable['u79'] = 'top';
var u176 = document.getElementById('u176');

u176.style.cursor = 'pointer';
if (bIE) u176.attachEvent("onclick", Clicku176);
else u176.addEventListener("click", Clicku176, true);
function Clicku176(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u175','hidden','fade',500);

}

}

var u55 = document.getElementById('u55');

var u411 = document.getElementById('u411');
gv_vAlignTable['u411'] = 'center';
var u149 = document.getElementById('u149');
gv_vAlignTable['u149'] = 'top';
var u111 = document.getElementById('u111');

var u391 = document.getElementById('u391');

var u306 = document.getElementById('u306');
gv_vAlignTable['u306'] = 'top';
var u284 = document.getElementById('u284');

var u12 = document.getElementById('u12');
gv_vAlignTable['u12'] = 'center';
var u342 = document.getElementById('u342');
gv_vAlignTable['u342'] = 'center';
var u161 = document.getElementById('u161');
gv_vAlignTable['u161'] = 'center';
var u329 = document.getElementById('u329');
gv_vAlignTable['u329'] = 'center';
var u356 = document.getElementById('u356');

var u175 = document.getElementById('u175');

var u229 = document.getElementById('u229');
gv_vAlignTable['u229'] = 'center';
var u148 = document.getElementById('u148');
gv_vAlignTable['u148'] = 'center';
var u110 = document.getElementById('u110');

if (bIE) u110.attachEvent("onfocus", Focusu110);
else u110.addEventListener("focus", Focusu110, true);
function Focusu110(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u111','','fade',500);

}

}

var u348 = document.getElementById('u348');

var u305 = document.getElementById('u305');

var u283 = document.getElementById('u283');

var u20 = document.getElementById('u20');

var u124 = document.getElementById('u124');
gv_vAlignTable['u124'] = 'center';
var u279 = document.getElementById('u279');

var u241 = document.getElementById('u241');
gv_vAlignTable['u241'] = 'center';
var u160 = document.getElementById('u160');

u160.style.cursor = 'pointer';
if (bIE) u160.attachEvent("onclick", Clicku160);
else u160.addEventListener("click", Clicku160, true);
function Clicku160(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u159','hidden','fade',500);

}

}

var u297 = document.getElementById('u297');

var u8 = document.getElementById('u8');
gv_vAlignTable['u8'] = 'top';
var u49 = document.getElementById('u49');

var u355 = document.getElementById('u355');

if (bIE) u355.attachEvent("onfocus", Focusu355);
else u355.addEventListener("focus", Focusu355, true);
function Focusu355(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u356','','fade',500);

}

}

var u25 = document.getElementById('u25');

var u309 = document.getElementById('u309');

u309.style.cursor = 'pointer';
if (bIE) u309.attachEvent("onclick", Clicku309);
else u309.addEventListener("click", Clicku309, true);
function Clicku309(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u308','hidden','fade',500);

}

}

var u228 = document.getElementById('u228');

u228.style.cursor = 'pointer';
if (bIE) u228.attachEvent("onclick", Clicku228);
else u228.addEventListener("click", Clicku228, true);
function Clicku228(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Artesanos.html" + GetQuerystring();

}

}

if (bIE) u228.attachEvent("onmouseover", MouseOveru228);
else u228.addEventListener("mouseover", MouseOveru228, true);
function MouseOveru228(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u228',e)) return;
if (true) {

	SetPanelVisibility('u239','','none',500);

	SetPanelVisibility('u242','hidden','none',500);

	SetPanelVisibility('u236','hidden','none',500);

	SetPanelVisibility('u255','hidden','none',500);

}

}

var u81 = document.getElementById('u81');
gv_vAlignTable['u81'] = 'top';
var u88 = document.getElementById('u88');

var u304 = document.getElementById('u304');
gv_vAlignTable['u304'] = 'top';
var u282 = document.getElementById('u282');

var u76 = document.getElementById('u76');

var u123 = document.getElementById('u123');

var u278 = document.getElementById('u278');

var u240 = document.getElementById('u240');

u240.style.cursor = 'pointer';
if (bIE) u240.attachEvent("onclick", Clicku240);
else u240.addEventListener("click", Clicku240, true);
function Clicku240(e)
{
windowEvent = e;


if (true) {

	self.location.href="registrar_artesano.html" + GetQuerystring();

}

}

var u296 = document.getElementById('u296');
gv_vAlignTable['u296'] = 'top';
var u137 = document.getElementById('u137');
gv_vAlignTable['u137'] = 'center';
var u33 = document.getElementById('u33');
gv_vAlignTable['u33'] = 'top';
var u254 = document.getElementById('u254');
gv_vAlignTable['u254'] = 'center';
var u173 = document.getElementById('u173');
gv_vAlignTable['u173'] = 'top';
var u343 = document.getElementById('u343');

var u213 = document.getElementById('u213');
gv_vAlignTable['u213'] = 'top';
var u303 = document.getElementById('u303');

var u281 = document.getElementById('u281');

var u94 = document.getElementById('u94');

var u122 = document.getElementById('u122');

var u358 = document.getElementById('u358');
gv_vAlignTable['u358'] = 'center';
var u5 = document.getElementById('u5');
gv_vAlignTable['u5'] = 'top';
var u317 = document.getElementById('u317');

u317.style.cursor = 'pointer';
if (bIE) u317.attachEvent("onclick", Clicku317);
else u317.addEventListener("click", Clicku317, true);
function Clicku317(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u316','hidden','fade',500);

}

}

var u295 = document.getElementById('u295');

var u136 = document.getElementById('u136');

u136.style.cursor = 'pointer';
if (bIE) u136.attachEvent("onclick", Clicku136);
else u136.addEventListener("click", Clicku136, true);
function Clicku136(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u135','hidden','fade',500);

}

}

var u51 = document.getElementById('u51');
gv_vAlignTable['u51'] = 'top';
var u109 = document.getElementById('u109');
gv_vAlignTable['u109'] = 'top';
var u253 = document.getElementById('u253');

u253.style.cursor = 'pointer';
if (bIE) u253.attachEvent("onclick", Clicku253);
else u253.addEventListener("click", Clicku253, true);
function Clicku253(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_estadistico_de_calificaciones.html" + GetQuerystring();

}

}

var u172 = document.getElementById('u172');
gv_vAlignTable['u172'] = 'center';
var u410 = document.getElementById('u410');

u410.style.cursor = 'pointer';
if (bIE) u410.attachEvent("onclick", Clicku410);
else u410.addEventListener("click", Clicku410, true);
function Clicku410(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u412','','none',500);

}

}

var u359 = document.getElementById('u359');

var u267 = document.getElementById('u267');
gv_vAlignTable['u267'] = 'top';
var u399 = document.getElementById('u399');
gv_vAlignTable['u399'] = 'top';
var u302 = document.getElementById('u302');
gv_vAlignTable['u302'] = 'top';
var u280 = document.getElementById('u280');

var u121 = document.getElementById('u121');
gv_vAlignTable['u121'] = 'center';
var u414 = document.getElementById('u414');
gv_vAlignTable['u414'] = 'center';
var u409 = document.getElementById('u409');

var u316 = document.getElementById('u316');

var u294 = document.getElementById('u294');
gv_vAlignTable['u294'] = 'top';
var u135 = document.getElementById('u135');

var u108 = document.getElementById('u108');
gv_vAlignTable['u108'] = 'center';
var u252 = document.getElementById('u252');
gv_vAlignTable['u252'] = 'center';
var u171 = document.getElementById('u171');

var u191 = document.getElementById('u191');

var u386 = document.getElementById('u386');
gv_vAlignTable['u386'] = 'top';
var u266 = document.getElementById('u266');
gv_vAlignTable['u266'] = 'top';
var u64 = document.getElementById('u64');
gv_vAlignTable['u64'] = 'top';
var u239 = document.getElementById('u239');

var u301 = document.getElementById('u301');

var u120 = document.getElementById('u120');

u120.style.cursor = 'pointer';
if (bIE) u120.attachEvent("onclick", Clicku120);
else u120.addEventListener("click", Clicku120, true);
function Clicku120(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u119','hidden','fade',500);

}

}

var u2 = document.getElementById('u2');

var u315 = document.getElementById('u315');

if (bIE) u315.attachEvent("onfocus", Focusu315);
else u315.addEventListener("focus", Focusu315, true);
function Focusu315(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u316','','fade',500);

}

}

var u293 = document.getElementById('u293');

var u21 = document.getElementById('u21');

var u134 = document.getElementById('u134');

if (bIE) u134.attachEvent("onfocus", Focusu134);
else u134.addEventListener("focus", Focusu134, true);
function Focusu134(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u135','','fade',500);

}

}

var u251 = document.getElementById('u251');

u251.style.cursor = 'pointer';
if (bIE) u251.attachEvent("onclick", Clicku251);
else u251.addEventListener("click", Clicku251, true);
function Clicku251(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspeccion_por_estado_para_supervision.html" + GetQuerystring();

}

}

var u170 = document.getElementById('u170');

var u373 = document.getElementById('u373');

u373.style.cursor = 'pointer';
if (bIE) u373.attachEvent("onclick", Clicku373);
else u373.addEventListener("click", Clicku373, true);
function Clicku373(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u372','hidden','fade',500);

}

}

var u265 = document.getElementById('u265');
gv_vAlignTable['u265'] = 'top';
var u82 = document.getElementById('u82');

var u16 = document.getElementById('u16');
gv_vAlignTable['u16'] = 'center';
var u238 = document.getElementById('u238');
gv_vAlignTable['u238'] = 'center';
var u200 = document.getElementById('u200');

u200.style.cursor = 'pointer';
if (bIE) u200.attachEvent("onclick", Clicku200);
else u200.addEventListener("click", Clicku200, true);
function Clicku200(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u199','hidden','fade',500);

}

}

var u314 = document.getElementById('u314');
gv_vAlignTable['u314'] = 'top';
var u292 = document.getElementById('u292');
gv_vAlignTable['u292'] = 'top';
var u77 = document.getElementById('u77');
gv_vAlignTable['u77'] = 'top';
var u133 = document.getElementById('u133');
gv_vAlignTable['u133'] = 'top';
var u369 = document.getElementById('u369');
gv_vAlignTable['u369'] = 'center';
var u250 = document.getElementById('u250');
gv_vAlignTable['u250'] = 'center';
var u387 = document.getElementById('u387');
gv_vAlignTable['u387'] = 'top';
var u147 = document.getElementById('u147');

var u58 = document.getElementById('u58');
gv_vAlignTable['u58'] = 'top';
var u34 = document.getElementById('u34');
gv_vAlignTable['u34'] = 'top';
var u90 = document.getElementById('u90');

var u61 = document.getElementById('u61');
gv_vAlignTable['u61'] = 'top';
var u164 = document.getElementById('u164');
gv_vAlignTable['u164'] = 'center';
var u95 = document.getElementById('u95');
gv_vAlignTable['u95'] = 'top';
var u132 = document.getElementById('u132');
gv_vAlignTable['u132'] = 'center';
var u368 = document.getElementById('u368');

var u255 = document.getElementById('u255');

var u146 = document.getElementById('u146');

var u52 = document.getElementById('u52');

var u125 = document.getElementById('u125');
gv_vAlignTable['u125'] = 'top';
var u263 = document.getElementById('u263');

var u91 = document.getElementById('u91');
gv_vAlignTable['u91'] = 'top';
var u277 = document.getElementById('u277');

var u388 = document.getElementById('u388');

var u47 = document.getElementById('u47');
gv_vAlignTable['u47'] = 'top';
var u212 = document.getElementById('u212');
gv_vAlignTable['u212'] = 'center';
var u131 = document.getElementById('u131');

var u407 = document.getElementById('u407');
gv_vAlignTable['u407'] = 'top';
var u385 = document.getElementById('u385');
gv_vAlignTable['u385'] = 'center';
var u28 = document.getElementById('u28');

var u145 = document.getElementById('u145');
gv_vAlignTable['u145'] = 'center';
var u118 = document.getElementById('u118');

if (bIE) u118.attachEvent("onfocus", Focusu118);
else u118.addEventListener("focus", Focusu118, true);
function Focusu118(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u119','','fade',500);

}

}

var u262 = document.getElementById('u262');

var u322 = document.getElementById('u322');
gv_vAlignTable['u322'] = 'top';
var u276 = document.getElementById('u276');

var u89 = document.getElementById('u89');
gv_vAlignTable['u89'] = 'top';
var u249 = document.getElementById('u249');

u249.style.cursor = 'pointer';
if (bIE) u249.attachEvent("onclick", Clicku249);
else u249.addEventListener("click", Clicku249, true);
function Clicku249(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspecciones.html" + GetQuerystring();

}

}

var u211 = document.getElementById('u211');

var u130 = document.getElementById('u130');

var u345 = document.getElementById('u345');
gv_vAlignTable['u345'] = 'center';
var u85 = document.getElementById('u85');
gv_vAlignTable['u85'] = 'top';
var u406 = document.getElementById('u406');

var u384 = document.getElementById('u384');

var u22 = document.getElementById('u22');

var u144 = document.getElementById('u144');

u144.style.cursor = 'pointer';
if (bIE) u144.attachEvent("onclick", Clicku144);
else u144.addEventListener("click", Clicku144, true);
function Clicku144(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u143','hidden','fade',500);

}

}

var u261 = document.getElementById('u261');

var u43 = document.getElementById('u43');
gv_vAlignTable['u43'] = 'top';
var u275 = document.getElementById('u275');

var u17 = document.getElementById('u17');

var u248 = document.getElementById('u248');
gv_vAlignTable['u248'] = 'center';
var u210 = document.getElementById('u210');

var u325 = document.getElementById('u325');

u325.style.cursor = 'pointer';
if (bIE) u325.attachEvent("onclick", Clicku325);
else u325.addEventListener("click", Clicku325, true);
function Clicku325(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u324','hidden','fade',500);

}

}

var u107 = document.getElementById('u107');

var u44 = document.getElementById('u44');

var u405 = document.getElementById('u405');
gv_vAlignTable['u405'] = 'top';
var u383 = document.getElementById('u383');

var u30 = document.getElementById('u30');

var u224 = document.getElementById('u224');

u224.style.cursor = 'pointer';
if (bIE) u224.attachEvent("onclick", Clicku224);
else u224.addEventListener("click", Clicku224, true);
function Clicku224(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u143 = document.getElementById('u143');

var u379 = document.getElementById('u379');

if (bIE) u379.attachEvent("onfocus", Focusu379);
else u379.addEventListener("focus", Focusu379, true);
function Focusu379(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u380','','fade',500);

}

}

var u341 = document.getElementById('u341');

u341.style.cursor = 'pointer';
if (bIE) u341.attachEvent("onclick", Clicku341);
else u341.addEventListener("click", Clicku341, true);
function Clicku341(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u340','hidden','fade',500);

}

}

var u260 = document.getElementById('u260');

var u397 = document.getElementById('u397');
gv_vAlignTable['u397'] = 'top';
var u9 = document.getElementById('u9');
gv_vAlignTable['u9'] = 'top';
var u157 = document.getElementById('u157');
gv_vAlignTable['u157'] = 'top';
var u59 = document.getElementById('u59');

var u189 = document.getElementById('u189');
gv_vAlignTable['u189'] = 'top';
var u35 = document.getElementById('u35');
gv_vAlignTable['u35'] = 'top';
var u274 = document.getElementById('u274');

var u328 = document.getElementById('u328');

var u106 = document.getElementById('u106');

var u404 = document.getElementById('u404');

var u382 = document.getElementById('u382');
gv_vAlignTable['u382'] = 'center';
var u223 = document.getElementById('u223');
gv_vAlignTable['u223'] = 'center';
var u142 = document.getElementById('u142');

if (bIE) u142.attachEvent("onfocus", Focusu142);
else u142.addEventListener("focus", Focusu142, true);
function Focusu142(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u143','','fade',500);

}

}

var u86 = document.getElementById('u86');

var u70 = document.getElementById('u70');
gv_vAlignTable['u70'] = 'top';
var u396 = document.getElementById('u396');

var u237 = document.getElementById('u237');

u237.style.cursor = 'pointer';
if (bIE) u237.attachEvent("onclick", Clicku237);
else u237.addEventListener("click", Clicku237, true);
function Clicku237(e)
{
windowEvent = e;


if (true) {

	self.location.href="agregar_usuario.html" + GetQuerystring();

}

}

var u156 = document.getElementById('u156');
gv_vAlignTable['u156'] = 'center';
var u188 = document.getElementById('u188');
gv_vAlignTable['u188'] = 'center';
var u354 = document.getElementById('u354');
gv_vAlignTable['u354'] = 'top';
var u273 = document.getElementById('u273');

var u105 = document.getElementById('u105');
gv_vAlignTable['u105'] = 'center';
var u403 = document.getElementById('u403');
gv_vAlignTable['u403'] = 'top';
var u381 = document.getElementById('u381');

u381.style.cursor = 'pointer';
if (bIE) u381.attachEvent("onclick", Clicku381);
else u381.addEventListener("click", Clicku381, true);
function Clicku381(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u380','hidden','fade',500);

}

}

var u222 = document.getElementById('u222');

u222.style.cursor = 'pointer';
if (bIE) u222.attachEvent("onclick", Clicku222);
else u222.addEventListener("click", Clicku222, true);
function Clicku222(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u311 = document.getElementById('u311');

var u6 = document.getElementById('u6');
gv_vAlignTable['u6'] = 'top';
var u395 = document.getElementById('u395');
gv_vAlignTable['u395'] = 'top';
var u29 = document.getElementById('u29');

var u155 = document.getElementById('u155');

var u209 = document.getElementById('u209');
gv_vAlignTable['u209'] = 'center';
var u353 = document.getElementById('u353');
gv_vAlignTable['u353'] = 'center';
var u272 = document.getElementById('u272');

var u402 = document.getElementById('u402');

var u336 = document.getElementById('u336');

var u19 = document.getElementById('u19');

var u367 = document.getElementById('u367');

var u104 = document.getElementById('u104');

u104.style.cursor = 'pointer';
if (bIE) u104.attachEvent("onclick", Clicku104);
else u104.addEventListener("click", Clicku104, true);
function Clicku104(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u103','hidden','fade',500);

}

}

var u308 = document.getElementById('u308');

var u259 = document.getElementById('u259');
gv_vAlignTable['u259'] = 'top';
var u380 = document.getElementById('u380');

var u221 = document.getElementById('u221');
gv_vAlignTable['u221'] = 'top';
var u119 = document.getElementById('u119');

var u232 = document.getElementById('u232');

u232.style.cursor = 'pointer';
if (bIE) u232.attachEvent("onclick", Clicku232);
else u232.addEventListener("click", Clicku232, true);
function Clicku232(e)
{
windowEvent = e;


if (true) {

	self.location.href="parametros.html" + GetQuerystring();

}

}

if (bIE) u232.attachEvent("onmouseover", MouseOveru232);
else u232.addEventListener("mouseover", MouseOveru232, true);
function MouseOveru232(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u232',e)) return;
if (true) {

	SetPanelVisibility('u236','hidden','none',500);

	SetPanelVisibility('u242','hidden','none',500);

	SetPanelVisibility('u239','hidden','none',500);

	SetPanelVisibility('u255','hidden','none',500);

}

}

var u394 = document.getElementById('u394');

var u235 = document.getElementById('u235');
gv_vAlignTable['u235'] = 'center';
var u75 = document.getElementById('u75');
gv_vAlignTable['u75'] = 'top';
var u13 = document.getElementById('u13');

u13.style.cursor = 'pointer';
if (bIE) u13.attachEvent("onclick", Clicku13);
else u13.addEventListener("click", Clicku13, true);
function Clicku13(e)
{
windowEvent = e;


if (true) {

	self.location.href="datos_taller_artesano.html" + GetQuerystring();

}

}

var u208 = document.getElementById('u208');

u208.style.cursor = 'pointer';
if (bIE) u208.attachEvent("onclick", Clicku208);
else u208.addEventListener("click", Clicku208, true);
function Clicku208(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u207','hidden','fade',500);

}

}

var u352 = document.getElementById('u352');

var u271 = document.getElementById('u271');
gv_vAlignTable['u271'] = 'top';
var u312 = document.getElementById('u312');

var u366 = document.getElementById('u366');
gv_vAlignTable['u366'] = 'center';
var u98 = document.getElementById('u98');

var u103 = document.getElementById('u103');

var u339 = document.getElementById('u339');

if (bIE) u339.attachEvent("onfocus", Focusu339);
else u339.addEventListener("focus", Focusu339, true);
function Focusu339(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u340','','fade',500);

}

}

var u401 = document.getElementById('u401');
gv_vAlignTable['u401'] = 'top';
var u158 = document.getElementById('u158');

if (bIE) u158.attachEvent("onfocus", Focusu158);
else u158.addEventListener("focus", Focusu158, true);
function Focusu158(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u159','','fade',500);

}

}

var u220 = document.getElementById('u220');
gv_vAlignTable['u220'] = 'center';
var u3 = document.getElementById('u3');
gv_vAlignTable['u3'] = 'top';
var u117 = document.getElementById('u117');
gv_vAlignTable['u117'] = 'top';
var u393 = document.getElementById('u393');
gv_vAlignTable['u393'] = 'top';
var u31 = document.getElementById('u31');

var u234 = document.getElementById('u234');

u234.style.cursor = 'pointer';
if (bIE) u234.attachEvent("onclick", Clicku234);
else u234.addEventListener("click", Clicku234, true);
function Clicku234(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

if (bIE) u234.attachEvent("onmouseover", MouseOveru234);
else u234.addEventListener("mouseover", MouseOveru234, true);
function MouseOveru234(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u234',e)) return;
if (true) {

	SetPanelVisibility('u242','','none',500);

	SetPanelVisibility('u239','hidden','none',500);

	SetPanelVisibility('u236','hidden','none',500);

	SetPanelVisibility('u255','hidden','none',500);

}

}

var u73 = document.getElementById('u73');
gv_vAlignTable['u73'] = 'top';
var u351 = document.getElementById('u351');

var u270 = document.getElementById('u270');
gv_vAlignTable['u270'] = 'top';
var u199 = document.getElementById('u199');

var u319 = document.getElementById('u319');

var u92 = document.getElementById('u92');

var u102 = document.getElementById('u102');

if (bIE) u102.attachEvent("onfocus", Focusu102);
else u102.addEventListener("focus", Focusu102, true);
function Focusu102(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u103','','fade',500);

}

}

var u56 = document.getElementById('u56');
gv_vAlignTable['u56'] = 'top';
var u300 = document.getElementById('u300');
gv_vAlignTable['u300'] = 'top';
var u116 = document.getElementById('u116');
gv_vAlignTable['u116'] = 'center';
var u186 = document.getElementById('u186');

var u392 = document.getElementById('u392');

var u233 = document.getElementById('u233');
gv_vAlignTable['u233'] = 'center';
var u87 = document.getElementById('u87');
gv_vAlignTable['u87'] = 'top';
var u350 = document.getElementById('u350');
gv_vAlignTable['u350'] = 'center';
var u347 = document.getElementById('u347');

if (bIE) u347.attachEvent("onfocus", Focusu347);
else u347.addEventListener("focus", Focusu347, true);
function Focusu347(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u348','','fade',500);

}

}

var u247 = document.getElementById('u247');

u247.style.cursor = 'pointer';
if (bIE) u247.attachEvent("onclick", Clicku247);
else u247.addEventListener("click", Clicku247, true);
function Clicku247(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_artesano.html" + GetQuerystring();

}

}

var u68 = document.getElementById('u68');
gv_vAlignTable['u68'] = 'top';
var u226 = document.getElementById('u226');

u226.style.cursor = 'pointer';
if (bIE) u226.attachEvent("onclick", Clicku226);
else u226.addEventListener("click", Clicku226, true);
function Clicku226(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Usuarios.html" + GetQuerystring();

}

}

if (bIE) u226.attachEvent("onmouseover", MouseOveru226);
else u226.addEventListener("mouseover", MouseOveru226, true);
function MouseOveru226(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u226',e)) return;
if (true) {

	SetPanelVisibility('u236','','none',500);

	SetPanelVisibility('u239','hidden','none',500);

	SetPanelVisibility('u242','hidden','none',500);

	SetPanelVisibility('u255','','none',500);

}

}

var u198 = document.getElementById('u198');

if (bIE) u198.attachEvent("onfocus", Focusu198);
else u198.addEventListener("focus", Focusu198, true);
function Focusu198(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u199','','fade',500);

}

}

var u364 = document.getElementById('u364');

var u101 = document.getElementById('u101');
gv_vAlignTable['u101'] = 'top';
var u0 = document.getElementById('u0');

var u190 = document.getElementById('u190');

if (bIE) u190.attachEvent("onfocus", Focusu190);
else u190.addEventListener("focus", Focusu190, true);
function Focusu190(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u191','','fade',500);

}

}

var u115 = document.getElementById('u115');

var u313 = document.getElementById('u313');
gv_vAlignTable['u313'] = 'center';
var u291 = document.getElementById('u291');

var u7 = document.getElementById('u7');
gv_vAlignTable['u7'] = 'top';
var u246 = document.getElementById('u246');
gv_vAlignTable['u246'] = 'center';
var u62 = document.getElementById('u62');
gv_vAlignTable['u62'] = 'top';
var u219 = document.getElementById('u219');

var u363 = document.getElementById('u363');

if (bIE) u363.attachEvent("onfocus", Focusu363);
else u363.addEventListener("focus", Focusu363, true);
function Focusu363(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u364','','fade',500);

}

}

var u377 = document.getElementById('u377');
gv_vAlignTable['u377'] = 'center';
var u372 = document.getElementById('u372');

var u114 = document.getElementById('u114');

var u57 = document.getElementById('u57');

var u169 = document.getElementById('u169');
gv_vAlignTable['u169'] = 'center';
var u290 = document.getElementById('u290');
gv_vAlignTable['u290'] = 'top';
var u408 = document.getElementById('u408');
gv_vAlignTable['u408'] = 'top';
var u187 = document.getElementById('u187');

var u38 = document.getElementById('u38');
gv_vAlignTable['u38'] = 'top';
var u245 = document.getElementById('u245');

u245.style.cursor = 'pointer';
if (bIE) u245.attachEvent("onclick", Clicku245);
else u245.addEventListener("click", Clicku245, true);
function Clicku245(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_por_operador.html" + GetQuerystring();

}

}

var u412 = document.getElementById('u412');

var u14 = document.getElementById('u14');
gv_vAlignTable['u14'] = 'center';
var u218 = document.getElementById('u218');

var u362 = document.getElementById('u362');
gv_vAlignTable['u362'] = 'top';
var u376 = document.getElementById('u376');

var u99 = document.getElementById('u99');
gv_vAlignTable['u99'] = 'top';
var u286 = document.getElementById('u286');

var u349 = document.getElementById('u349');

u349.style.cursor = 'pointer';
if (bIE) u349.attachEvent("onclick", Clicku349);
else u349.addEventListener("click", Clicku349, true);
function Clicku349(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u348','hidden','fade',500);

}

}

var u168 = document.getElementById('u168');

u168.style.cursor = 'pointer';
if (bIE) u168.attachEvent("onclick", Clicku168);
else u168.addEventListener("click", Clicku168, true);
function Clicku168(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u167','hidden','fade',500);

}

}

var u230 = document.getElementById('u230');

u230.style.cursor = 'pointer';
if (bIE) u230.attachEvent("onclick", Clicku230);
else u230.addEventListener("click", Clicku230, true);
function Clicku230(e)
{
windowEvent = e;


if (true) {

	self.location.href="auditoria.html" + GetQuerystring();

}

}

if (bIE) u230.attachEvent("onmouseover", MouseOveru230);
else u230.addEventListener("mouseover", MouseOveru230, true);
function MouseOveru230(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u230',e)) return;
if (true) {

	SetPanelVisibility('u236','hidden','none',500);

	SetPanelVisibility('u239','hidden','none',500);

	SetPanelVisibility('u242','hidden','none',500);

	SetPanelVisibility('u255','hidden','none',500);

}

}

var u127 = document.getElementById('u127');

var u338 = document.getElementById('u338');
gv_vAlignTable['u338'] = 'top';
var u32 = document.getElementById('u32');
gv_vAlignTable['u32'] = 'top';
var u244 = document.getElementById('u244');
gv_vAlignTable['u244'] = 'center';
var u390 = document.getElementById('u390');

var u361 = document.getElementById('u361');
gv_vAlignTable['u361'] = 'center';
var u375 = document.getElementById('u375');

var u27 = document.getElementById('u27');

var u83 = document.getElementById('u83');
gv_vAlignTable['u83'] = 'top';
var u310 = document.getElementById('u310');
gv_vAlignTable['u310'] = 'center';
var u207 = document.getElementById('u207');

var u185 = document.getElementById('u185');
gv_vAlignTable['u185'] = 'center';
var u40 = document.getElementById('u40');
gv_vAlignTable['u40'] = 'top';
var u324 = document.getElementById('u324');

var u243 = document.getElementById('u243');

u243.style.cursor = 'pointer';
if (bIE) u243.attachEvent("onclick", Clicku243);
else u243.addEventListener("click", Clicku243, true);
function Clicku243(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

var u360 = document.getElementById('u360');

var u257 = document.getElementById('u257');
gv_vAlignTable['u257'] = 'center';
var u69 = document.getElementById('u69');

var u289 = document.getElementById('u289');

var u45 = document.getElementById('u45');
gv_vAlignTable['u45'] = 'top';
var u374 = document.getElementById('u374');
gv_vAlignTable['u374'] = 'center';
var u206 = document.getElementById('u206');

if (bIE) u206.attachEvent("onfocus", Focusu206);
else u206.addEventListener("focus", Focusu206, true);
function Focusu206(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u207','','fade',500);

}

}

var u184 = document.getElementById('u184');

u184.style.cursor = 'pointer';
if (bIE) u184.attachEvent("onclick", Clicku184);
else u184.addEventListener("click", Clicku184, true);
function Clicku184(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u183','hidden','fade',500);

}

}

var u323 = document.getElementById('u323');

if (bIE) u323.attachEvent("onfocus", Focusu323);
else u323.addEventListener("focus", Focusu323, true);
function Focusu323(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u324','','fade',500);

}

}

var u242 = document.getElementById('u242');

var u96 = document.getElementById('u96');

var u344 = document.getElementById('u344');

var u337 = document.getElementById('u337');
gv_vAlignTable['u337'] = 'center';
var u256 = document.getElementById('u256');

u256.style.cursor = 'pointer';
if (bIE) u256.attachEvent("onclick", Clicku256);
else u256.addEventListener("click", Clicku256, true);
function Clicku256(e)
{
windowEvent = e;


if (true) {

	self.location.href="mis_inspecciones.html" + GetQuerystring();

}

}

var u53 = document.getElementById('u53');

var u129 = document.getElementById('u129');
gv_vAlignTable['u129'] = 'center';
var u174 = document.getElementById('u174');

if (bIE) u174.attachEvent("onfocus", Focusu174);
else u174.addEventListener("focus", Focusu174, true);
function Focusu174(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u175','','fade',500);

}

}

var u205 = document.getElementById('u205');
gv_vAlignTable['u205'] = 'top';
var u183 = document.getElementById('u183');

var u10 = document.getElementById('u10');
gv_vAlignTable['u10'] = 'top';
var u179 = document.getElementById('u179');

var u141 = document.getElementById('u141');
gv_vAlignTable['u141'] = 'top';
var u197 = document.getElementById('u197');
gv_vAlignTable['u197'] = 'top';
var u39 = document.getElementById('u39');

var u71 = document.getElementById('u71');

var u15 = document.getElementById('u15');

u15.style.cursor = 'pointer';
if (bIE) u15.attachEvent("onclick", Clicku15);
else u15.addEventListener("click", Clicku15, true);
function Clicku15(e)
{
windowEvent = e;


if (true) {

	self.location.href="confirmacion_inspeccion.html" + GetQuerystring();

}

}

var u128 = document.getElementById('u128');

u128.style.cursor = 'pointer';
if (bIE) u128.attachEvent("onclick", Clicku128);
else u128.addEventListener("click", Clicku128, true);
function Clicku128(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u127','hidden','fade',500);

}

}

var u288 = document.getElementById('u288');
gv_vAlignTable['u288'] = 'top';
var u398 = document.getElementById('u398');
gv_vAlignTable['u398'] = 'top';
var u204 = document.getElementById('u204');
gv_vAlignTable['u204'] = 'center';
var u182 = document.getElementById('u182');

if (bIE) u182.attachEvent("onfocus", Focusu182);
else u182.addEventListener("focus", Focusu182, true);
function Focusu182(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u183','','fade',500);

}

}

var u66 = document.getElementById('u66');
gv_vAlignTable['u66'] = 'top';
var u178 = document.getElementById('u178');

var u140 = document.getElementById('u140');
gv_vAlignTable['u140'] = 'center';
var u196 = document.getElementById('u196');
gv_vAlignTable['u196'] = 'center';
var u335 = document.getElementById('u335');

var u23 = document.getElementById('u23');

var u154 = document.getElementById('u154');

var u264 = document.getElementById('u264');

var u371 = document.getElementById('u371');

if (bIE) u371.attachEvent("onfocus", Focusu371);
else u371.addEventListener("focus", Focusu371, true);
function Focusu371(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u372','','fade',500);

}

}

var u203 = document.getElementById('u203');

var u181 = document.getElementById('u181');
gv_vAlignTable['u181'] = 'top';
var u84 = document.getElementById('u84');

var u258 = document.getElementById('u258');

var u320 = document.getElementById('u320');

var u4 = document.getElementById('u4');
gv_vAlignTable['u4'] = 'top';
var u217 = document.getElementById('u217');
gv_vAlignTable['u217'] = 'center';
var u195 = document.getElementById('u195');

var u225 = document.getElementById('u225');
gv_vAlignTable['u225'] = 'center';
var u41 = document.getElementById('u41');

var u334 = document.getElementById('u334');
gv_vAlignTable['u334'] = 'center';
var u153 = document.getElementById('u153');
gv_vAlignTable['u153'] = 'center';
if (window.OnLoad) OnLoad();
