
var PageName = 'resultado de la busqueda';
var PageId = '50689d6406ea4ddfbcc04e154f7b4bff'
var PageUrl = 'resultado_de_la_busqueda_2.html'
document.title = 'resultado de la busqueda';
var PageNotes = 
{
"pageName":"resultado de la busqueda",
"showNotesNames":"False",
"Default":"<p style=\"text-align:left;\"><span style=\"\">LOS REPORTE DE CALIFICACIONES PERMITIRÁN DESCARGAR EL CERTIIFICADO DE <\/span><\/p>"}
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

var u21 = document.getElementById('u21');

var u86 = document.getElementById('u86');
gv_vAlignTable['u86'] = 'top';
var u51 = document.getElementById('u51');

var u102 = document.getElementById('u102');

u102.style.cursor = 'pointer';
if (bIE) u102.attachEvent("onclick", Clicku102);
else u102.addEventListener("click", Clicku102, true);
function Clicku102(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Artesanos.html" + GetQuerystring();

}

}

if (bIE) u102.attachEvent("onmouseover", MouseOveru102);
else u102.addEventListener("mouseover", MouseOveru102, true);
function MouseOveru102(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u102',e)) return;
if (true) {

	SetPanelVisibility('u113','','none',500);

	SetPanelVisibility('u116','hidden','none',500);

	SetPanelVisibility('u110','hidden','none',500);

	SetPanelVisibility('u129','hidden','none',500);

}

}

var u25 = document.getElementById('u25');
gv_vAlignTable['u25'] = 'center';
var u16 = document.getElementById('u16');
gv_vAlignTable['u16'] = 'center';
var u55 = document.getElementById('u55');
gv_vAlignTable['u55'] = 'center';
var u46 = document.getElementById('u46');

u46.style.cursor = 'pointer';
if (bIE) u46.attachEvent("onclick", Clicku46);
else u46.addEventListener("click", Clicku46, true);
function Clicku46(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u76 = document.getElementById('u76');
gv_vAlignTable['u76'] = 'center';
var u31 = document.getElementById('u31');
gv_vAlignTable['u31'] = 'center';
var u77 = document.getElementById('u77');
gv_vAlignTable['u77'] = 'top';
var u93 = document.getElementById('u93');
gv_vAlignTable['u93'] = 'top';
var u107 = document.getElementById('u107');
gv_vAlignTable['u107'] = 'center';
var u38 = document.getElementById('u38');

u38.style.cursor = 'pointer';
if (bIE) u38.attachEvent("onclick", Clicku38);
else u38.addEventListener("click", Clicku38, true);
function Clicku38(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u32 = document.getElementById('u32');

var u23 = document.getElementById('u23');

var u62 = document.getElementById('u62');

var u53 = document.getElementById('u53');

var u87 = document.getElementById('u87');
gv_vAlignTable['u87'] = 'top';
var u1 = document.getElementById('u1');

var u132 = document.getElementById('u132');

var u27 = document.getElementById('u27');

var u7 = document.getElementById('u7');

u7.style.cursor = 'pointer';
if (bIE) u7.attachEvent("onclick", Clicku7);
else u7.addEventListener("click", Clicku7, true);
function Clicku7(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u66 = document.getElementById('u66');
gv_vAlignTable['u66'] = 'top';
var u112 = document.getElementById('u112');
gv_vAlignTable['u112'] = 'center';
var u115 = document.getElementById('u115');
gv_vAlignTable['u115'] = 'center';
var u104 = document.getElementById('u104');

u104.style.cursor = 'pointer';
if (bIE) u104.attachEvent("onclick", Clicku104);
else u104.addEventListener("click", Clicku104, true);
function Clicku104(e)
{
windowEvent = e;


if (true) {

	self.location.href="auditoria.html" + GetQuerystring();

}

}

if (bIE) u104.attachEvent("onmouseover", MouseOveru104);
else u104.addEventListener("mouseover", MouseOveru104, true);
function MouseOveru104(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u104',e)) return;
if (true) {

	SetPanelVisibility('u110','hidden','none',500);

	SetPanelVisibility('u113','hidden','none',500);

	SetPanelVisibility('u116','hidden','none',500);

	SetPanelVisibility('u129','hidden','none',500);

}

}

var u30 = document.getElementById('u30');

u30.style.cursor = 'pointer';
if (bIE) u30.attachEvent("onclick", Clicku30);
else u30.addEventListener("click", Clicku30, true);
function Clicku30(e)
{
windowEvent = e;


if (true) {

}

}

var u8 = document.getElementById('u8');
gv_vAlignTable['u8'] = 'center';
var u60 = document.getElementById('u60');

u60.style.cursor = 'pointer';
if (bIE) u60.attachEvent("onclick", Clicku60);
else u60.addEventListener("click", Clicku60, true);
function Clicku60(e)
{
windowEvent = e;


if (true) {

}

}

var u89 = document.getElementById('u89');
gv_vAlignTable['u89'] = 'top';
var u122 = document.getElementById('u122');
gv_vAlignTable['u122'] = 'center';
var u34 = document.getElementById('u34');

var u17 = document.getElementById('u17');
gv_vAlignTable['u17'] = 'top';
var u64 = document.getElementById('u64');
gv_vAlignTable['u64'] = 'top';
var u100 = document.getElementById('u100');

u100.style.cursor = 'pointer';
if (bIE) u100.attachEvent("onclick", Clicku100);
else u100.addEventListener("click", Clicku100, true);
function Clicku100(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Usuarios.html" + GetQuerystring();

}

}

if (bIE) u100.attachEvent("onmouseover", MouseOveru100);
else u100.addEventListener("mouseover", MouseOveru100, true);
function MouseOveru100(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u100',e)) return;
if (true) {

	SetPanelVisibility('u110','','none',500);

	SetPanelVisibility('u113','hidden','none',500);

	SetPanelVisibility('u116','hidden','none',500);

	SetPanelVisibility('u129','','none',500);

}

}

var u19 = document.getElementById('u19');
gv_vAlignTable['u19'] = 'center';
var u49 = document.getElementById('u49');
gv_vAlignTable['u49'] = 'center';
var u103 = document.getElementById('u103');
gv_vAlignTable['u103'] = 'center';
var u79 = document.getElementById('u79');
gv_vAlignTable['u79'] = 'center';
var u81 = document.getElementById('u81');
gv_vAlignTable['u81'] = 'top';
var u97 = document.getElementById('u97');
gv_vAlignTable['u97'] = 'center';
var u118 = document.getElementById('u118');
gv_vAlignTable['u118'] = 'center';
var u124 = document.getElementById('u124');
gv_vAlignTable['u124'] = 'center';
var u85 = document.getElementById('u85');
gv_vAlignTable['u85'] = 'top';
var u11 = document.getElementById('u11');

u11.style.cursor = 'pointer';
if (bIE) u11.attachEvent("onclick", Clicku11);
else u11.addEventListener("click", Clicku11, true);
function Clicku11(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u41 = document.getElementById('u41');
gv_vAlignTable['u41'] = 'center';
var u108 = document.getElementById('u108');

u108.style.cursor = 'pointer';
if (bIE) u108.attachEvent("onclick", Clicku108);
else u108.addEventListener("click", Clicku108, true);
function Clicku108(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

if (bIE) u108.attachEvent("onmouseover", MouseOveru108);
else u108.addEventListener("mouseover", MouseOveru108, true);
function MouseOveru108(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u108',e)) return;
if (true) {

	SetPanelVisibility('u116','','none',500);

	SetPanelVisibility('u113','hidden','none',500);

	SetPanelVisibility('u110','hidden','none',500);

	SetPanelVisibility('u129','hidden','none',500);

}

}

var u71 = document.getElementById('u71');
gv_vAlignTable['u71'] = 'top';
var u15 = document.getElementById('u15');

u15.style.cursor = 'pointer';
if (bIE) u15.attachEvent("onclick", Clicku15);
else u15.addEventListener("click", Clicku15, true);
function Clicku15(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u45 = document.getElementById('u45');
gv_vAlignTable['u45'] = 'center';
var u36 = document.getElementById('u36');

var u75 = document.getElementById('u75');

var u58 = document.getElementById('u58');
gv_vAlignTable['u58'] = 'center';
var u37 = document.getElementById('u37');

var u126 = document.getElementById('u126');
gv_vAlignTable['u126'] = 'center';
var u2 = document.getElementById('u2');
gv_vAlignTable['u2'] = 'center';
var u92 = document.getElementById('u92');
gv_vAlignTable['u92'] = 'top';
var u83 = document.getElementById('u83');
gv_vAlignTable['u83'] = 'top';
var u130 = document.getElementById('u130');

u130.style.cursor = 'pointer';
if (bIE) u130.attachEvent("onclick", Clicku130);
else u130.addEventListener("click", Clicku130, true);
function Clicku130(e)
{
windowEvent = e;


if (true) {

	self.location.href="mis_inspecciones.html" + GetQuerystring();

}

}

var u129 = document.getElementById('u129');

var u95 = document.getElementById('u95');
gv_vAlignTable['u95'] = 'top';
var u22 = document.getElementById('u22');
gv_vAlignTable['u22'] = 'center';
var u13 = document.getElementById('u13');

u13.style.cursor = 'pointer';
if (bIE) u13.attachEvent("onclick", Clicku13);
else u13.addEventListener("click", Clicku13, true);
function Clicku13(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u52 = document.getElementById('u52');
gv_vAlignTable['u52'] = 'center';
var u43 = document.getElementById('u43');
gv_vAlignTable['u43'] = 'center';
var u0 = document.getElementById('u0');
gv_vAlignTable['u0'] = 'top';
var u3 = document.getElementById('u3');

var u47 = document.getElementById('u47');
gv_vAlignTable['u47'] = 'center';
var u68 = document.getElementById('u68');
gv_vAlignTable['u68'] = 'top';
var u90 = document.getElementById('u90');
gv_vAlignTable['u90'] = 'top';
var u73 = document.getElementById('u73');
gv_vAlignTable['u73'] = 'top';
var u84 = document.getElementById('u84');
gv_vAlignTable['u84'] = 'top';
var u20 = document.getElementById('u20');

var u119 = document.getElementById('u119');

u119.style.cursor = 'pointer';
if (bIE) u119.attachEvent("onclick", Clicku119);
else u119.addEventListener("click", Clicku119, true);
function Clicku119(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_por_operador.html" + GetQuerystring();

}

}

var u50 = document.getElementById('u50');

var u128 = document.getElementById('u128');
gv_vAlignTable['u128'] = 'center';
var u106 = document.getElementById('u106');

u106.style.cursor = 'pointer';
if (bIE) u106.attachEvent("onclick", Clicku106);
else u106.addEventListener("click", Clicku106, true);
function Clicku106(e)
{
windowEvent = e;


if (true) {

	self.location.href="parametros.html" + GetQuerystring();

}

}

if (bIE) u106.attachEvent("onmouseover", MouseOveru106);
else u106.addEventListener("mouseover", MouseOveru106, true);
function MouseOveru106(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u106',e)) return;
if (true) {

	SetPanelVisibility('u110','hidden','none',500);

	SetPanelVisibility('u116','hidden','none',500);

	SetPanelVisibility('u113','hidden','none',500);

	SetPanelVisibility('u129','hidden','none',500);

}

}

var u28 = document.getElementById('u28');
gv_vAlignTable['u28'] = 'center';
var u24 = document.getElementById('u24');

u24.style.cursor = 'pointer';
if (bIE) u24.attachEvent("onclick", Clicku24);
else u24.addEventListener("click", Clicku24, true);
function Clicku24(e)
{
windowEvent = e;


if (true) {

}

}

var u54 = document.getElementById('u54');

u54.style.cursor = 'pointer';
if (bIE) u54.attachEvent("onclick", Clicku54);
else u54.addEventListener("click", Clicku54, true);
function Clicku54(e)
{
windowEvent = e;


if (true) {

}

}

var u99 = document.getElementById('u99');
gv_vAlignTable['u99'] = 'center';
var u113 = document.getElementById('u113');

var u39 = document.getElementById('u39');
gv_vAlignTable['u39'] = 'center';
var u111 = document.getElementById('u111');

u111.style.cursor = 'pointer';
if (bIE) u111.attachEvent("onclick", Clicku111);
else u111.addEventListener("click", Clicku111, true);
function Clicku111(e)
{
windowEvent = e;


if (true) {

	self.location.href="agregar_usuario.html" + GetQuerystring();

}

}

var u69 = document.getElementById('u69');
gv_vAlignTable['u69'] = 'top';
var u78 = document.getElementById('u78');

var u120 = document.getElementById('u120');
gv_vAlignTable['u120'] = 'center';
var u131 = document.getElementById('u131');
gv_vAlignTable['u131'] = 'center';
var u114 = document.getElementById('u114');

u114.style.cursor = 'pointer';
if (bIE) u114.attachEvent("onclick", Clicku114);
else u114.addEventListener("click", Clicku114, true);
function Clicku114(e)
{
windowEvent = e;


if (true) {

	self.location.href="registrar_artesano.html" + GetQuerystring();

}

}

var u4 = document.getElementById('u4');
gv_vAlignTable['u4'] = 'center';
var u94 = document.getElementById('u94');
gv_vAlignTable['u94'] = 'top';
var u6 = document.getElementById('u6');

var u96 = document.getElementById('u96');

u96.style.cursor = 'pointer';
if (bIE) u96.attachEvent("onclick", Clicku96);
else u96.addEventListener("click", Clicku96, true);
function Clicku96(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u61 = document.getElementById('u61');
gv_vAlignTable['u61'] = 'center';
var u91 = document.getElementById('u91');
gv_vAlignTable['u91'] = 'top';
var u35 = document.getElementById('u35');
gv_vAlignTable['u35'] = 'center';
var u26 = document.getElementById('u26');

var u65 = document.getElementById('u65');
gv_vAlignTable['u65'] = 'top';
var u56 = document.getElementById('u56');

var u116 = document.getElementById('u116');

var u127 = document.getElementById('u127');

u127.style.cursor = 'pointer';
if (bIE) u127.attachEvent("onclick", Clicku127);
else u127.addEventListener("click", Clicku127, true);
function Clicku127(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_estadistico_de_calificaciones.html" + GetQuerystring();

}

}

var u105 = document.getElementById('u105');
gv_vAlignTable['u105'] = 'center';
var u109 = document.getElementById('u109');
gv_vAlignTable['u109'] = 'center';
var u123 = document.getElementById('u123');

u123.style.cursor = 'pointer';
if (bIE) u123.attachEvent("onclick", Clicku123);
else u123.addEventListener("click", Clicku123, true);
function Clicku123(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspecciones.html" + GetQuerystring();

}

}

var u82 = document.getElementById('u82');
gv_vAlignTable['u82'] = 'top';
var u5 = document.getElementById('u5');

var u12 = document.getElementById('u12');
gv_vAlignTable['u12'] = 'center';
var u9 = document.getElementById('u9');

var u42 = document.getElementById('u42');

u42.style.cursor = 'pointer';
if (bIE) u42.attachEvent("onclick", Clicku42);
else u42.addEventListener("click", Clicku42, true);
function Clicku42(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u33 = document.getElementById('u33');
gv_vAlignTable['u33'] = 'center';
var u72 = document.getElementById('u72');
gv_vAlignTable['u72'] = 'top';
var u63 = document.getElementById('u63');
gv_vAlignTable['u63'] = 'center';
var u18 = document.getElementById('u18');

var u48 = document.getElementById('u48');

var u110 = document.getElementById('u110');

var u67 = document.getElementById('u67');
gv_vAlignTable['u67'] = 'top';
var u88 = document.getElementById('u88');
gv_vAlignTable['u88'] = 'top';
var u57 = document.getElementById('u57');

var u125 = document.getElementById('u125');

u125.style.cursor = 'pointer';
if (bIE) u125.attachEvent("onclick", Clicku125);
else u125.addEventListener("click", Clicku125, true);
function Clicku125(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspeccion_por_estado_para_supervision.html" + GetQuerystring();

}

}

var u101 = document.getElementById('u101');
gv_vAlignTable['u101'] = 'center';
var u10 = document.getElementById('u10');
gv_vAlignTable['u10'] = 'center';
var u40 = document.getElementById('u40');

var u70 = document.getElementById('u70');
gv_vAlignTable['u70'] = 'top';
var u14 = document.getElementById('u14');
gv_vAlignTable['u14'] = 'center';
var u44 = document.getElementById('u44');

u44.style.cursor = 'pointer';
if (bIE) u44.attachEvent("onclick", Clicku44);
else u44.addEventListener("click", Clicku44, true);
function Clicku44(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u117 = document.getElementById('u117');

u117.style.cursor = 'pointer';
if (bIE) u117.attachEvent("onclick", Clicku117);
else u117.addEventListener("click", Clicku117, true);
function Clicku117(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

var u74 = document.getElementById('u74');
gv_vAlignTable['u74'] = 'top';
var u29 = document.getElementById('u29');

var u59 = document.getElementById('u59');

var u98 = document.getElementById('u98');

u98.style.cursor = 'pointer';
if (bIE) u98.attachEvent("onclick", Clicku98);
else u98.addEventListener("click", Clicku98, true);
function Clicku98(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u80 = document.getElementById('u80');

var u121 = document.getElementById('u121');

u121.style.cursor = 'pointer';
if (bIE) u121.attachEvent("onclick", Clicku121);
else u121.addEventListener("click", Clicku121, true);
function Clicku121(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_artesano.html" + GetQuerystring();

}

}

if (window.OnLoad) OnLoad();
