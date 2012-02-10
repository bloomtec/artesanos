
var PageName = 'registrar artesano';
var PageId = 'bc9fbff36a5148e5905e41fdb80f21b1'
var PageUrl = 'registrar_artesano.html'
document.title = 'registrar artesano';
var PageNotes = 
{
"pageName":"registrar artesano",
"showNotesNames":"False",
"validaciones":"<p style=\"text-align:left;\"><span style=\"\">Campos a validar<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">Cédula<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">Fecha de nacimiento<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">Edad<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">No de hijos mayores<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">No de hijos menores<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">Teléfono celular<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">Teléfono convencional<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">&nbsp;<\/span><\/p>",
"funcionalidades":"<p style=\"text-align:left;\"><span style=\"\">Cuando una persona ingrese la cedula del artesano, si esta en base de datos debe automaticamente cargar los datos de la ultima calificación.<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">&nbsp;<\/span><\/p>"}
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

widgetIdToHideFunction['u90'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u93','','none',500);

}

}
var u21 = document.getElementById('u21');
gv_vAlignTable['u21'] = 'top';
var u86 = document.getElementById('u86');

var u51 = document.getElementById('u51');

var u102 = document.getElementById('u102');
gv_vAlignTable['u102'] = 'center';
var u25 = document.getElementById('u25');
gv_vAlignTable['u25'] = 'top';
var u16 = document.getElementById('u16');
gv_vAlignTable['u16'] = 'top';
var u55 = document.getElementById('u55');

var u46 = document.getElementById('u46');

var u76 = document.getElementById('u76');

var u31 = document.getElementById('u31');
gv_vAlignTable['u31'] = 'top';
var u77 = document.getElementById('u77');
gv_vAlignTable['u77'] = 'top';
var u93 = document.getElementById('u93');

var u107 = document.getElementById('u107');

u107.style.cursor = 'pointer';
if (bIE) u107.attachEvent("onclick", Clicku107);
else u107.addEventListener("click", Clicku107, true);
function Clicku107(e)
{
windowEvent = e;


if (true) {

	self.location.href="parametros.html" + GetQuerystring();

}

}

if (bIE) u107.attachEvent("onmouseover", MouseOveru107);
else u107.addEventListener("mouseover", MouseOveru107, true);
function MouseOveru107(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u107',e)) return;
if (true) {

	SetPanelVisibility('u111','hidden','none',500);

	SetPanelVisibility('u117','hidden','none',500);

	SetPanelVisibility('u114','hidden','none',500);

	SetPanelVisibility('u130','hidden','none',500);

}

}

var u38 = document.getElementById('u38');
gv_vAlignTable['u38'] = 'top';
var u32 = document.getElementById('u32');
gv_vAlignTable['u32'] = 'top';
var u23 = document.getElementById('u23');
gv_vAlignTable['u23'] = 'top';
var u62 = document.getElementById('u62');
gv_vAlignTable['u62'] = 'top';
var u53 = document.getElementById('u53');

var u87 = document.getElementById('u87');
gv_vAlignTable['u87'] = 'top';
var u1 = document.getElementById('u1');
gv_vAlignTable['u1'] = 'center';
var u119 = document.getElementById('u119');
gv_vAlignTable['u119'] = 'center';
var u27 = document.getElementById('u27');
gv_vAlignTable['u27'] = 'top';
var u7 = document.getElementById('u7');

u7.style.cursor = 'pointer';
if (bIE) u7.attachEvent("onclick", Clicku7);
else u7.addEventListener("click", Clicku7, true);
function Clicku7(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Artesanos.html" + GetQuerystring();

}

}

var u66 = document.getElementById('u66');
gv_vAlignTable['u66'] = 'top';
var u112 = document.getElementById('u112');

u112.style.cursor = 'pointer';
if (bIE) u112.attachEvent("onclick", Clicku112);
else u112.addEventListener("click", Clicku112, true);
function Clicku112(e)
{
windowEvent = e;


if (true) {

	self.location.href="agregar_usuario.html" + GetQuerystring();

}

}

var u115 = document.getElementById('u115');

u115.style.cursor = 'pointer';
if (bIE) u115.attachEvent("onclick", Clicku115);
else u115.addEventListener("click", Clicku115, true);
function Clicku115(e)
{
windowEvent = e;


if (true) {

	self.location.href="resources/reload.html#" + encodeURI(PageUrl + GetQuerystring());

}

}

var u104 = document.getElementById('u104');
gv_vAlignTable['u104'] = 'center';
var u30 = document.getElementById('u30');

var u8 = document.getElementById('u8');
gv_vAlignTable['u8'] = 'center';
var u60 = document.getElementById('u60');
gv_vAlignTable['u60'] = 'top';
var u133 = document.getElementById('u133');

var u89 = document.getElementById('u89');

if (bIE) u89.attachEvent("onfocus", Focusu89);
else u89.addEventListener("focus", Focusu89, true);
function Focusu89(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u90','','fade',500);

}

}

var u122 = document.getElementById('u122');

u122.style.cursor = 'pointer';
if (bIE) u122.attachEvent("onclick", Clicku122);
else u122.addEventListener("click", Clicku122, true);
function Clicku122(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_artesano.html" + GetQuerystring();

}

}

var u34 = document.getElementById('u34');
gv_vAlignTable['u34'] = 'top';
var u17 = document.getElementById('u17');

var u64 = document.getElementById('u64');
gv_vAlignTable['u64'] = 'top';
var u100 = document.getElementById('u100');
gv_vAlignTable['u100'] = 'center';
var u19 = document.getElementById('u19');

var u49 = document.getElementById('u49');

var u103 = document.getElementById('u103');

u103.style.cursor = 'pointer';
if (bIE) u103.attachEvent("onclick", Clicku103);
else u103.addEventListener("click", Clicku103, true);
function Clicku103(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Artesanos.html" + GetQuerystring();

}

}

if (bIE) u103.attachEvent("onmouseover", MouseOveru103);
else u103.addEventListener("mouseover", MouseOveru103, true);
function MouseOveru103(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u103',e)) return;
if (true) {

	SetPanelVisibility('u114','','none',500);

	SetPanelVisibility('u117','hidden','none',500);

	SetPanelVisibility('u111','hidden','none',500);

	SetPanelVisibility('u130','hidden','none',500);

}

}

var u79 = document.getElementById('u79');
gv_vAlignTable['u79'] = 'top';
var u81 = document.getElementById('u81');
gv_vAlignTable['u81'] = 'top';
var u97 = document.getElementById('u97');

u97.style.cursor = 'pointer';
if (bIE) u97.attachEvent("onclick", Clicku97);
else u97.addEventListener("click", Clicku97, true);
function Clicku97(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u118 = document.getElementById('u118');

u118.style.cursor = 'pointer';
if (bIE) u118.attachEvent("onclick", Clicku118);
else u118.addEventListener("click", Clicku118, true);
function Clicku118(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

var u124 = document.getElementById('u124');

u124.style.cursor = 'pointer';
if (bIE) u124.attachEvent("onclick", Clicku124);
else u124.addEventListener("click", Clicku124, true);
function Clicku124(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspecciones.html" + GetQuerystring();

}

}

var u85 = document.getElementById('u85');

if (bIE) u85.attachEvent("onfocus", Focusu85);
else u85.addEventListener("focus", Focusu85, true);
function Focusu85(e)
{
windowEvent = e;


if ((GetSelectedOption('u85')) == ('Ninguna')) {

	SetPanelVisibility('u86','hidden','none',500);

}

}

var u11 = document.getElementById('u11');
gv_vAlignTable['u11'] = 'top';
var u41 = document.getElementById('u41');
gv_vAlignTable['u41'] = 'top';
var u108 = document.getElementById('u108');
gv_vAlignTable['u108'] = 'center';
var u71 = document.getElementById('u71');

var u15 = document.getElementById('u15');

var u45 = document.getElementById('u45');
gv_vAlignTable['u45'] = 'top';
var u36 = document.getElementById('u36');

var u75 = document.getElementById('u75');

var u58 = document.getElementById('u58');
gv_vAlignTable['u58'] = 'top';
var u37 = document.getElementById('u37');
gv_vAlignTable['u37'] = 'top';
var u126 = document.getElementById('u126');

u126.style.cursor = 'pointer';
if (bIE) u126.attachEvent("onclick", Clicku126);
else u126.addEventListener("click", Clicku126, true);
function Clicku126(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspeccion_por_estado_para_supervision.html" + GetQuerystring();

}

}

var u2 = document.getElementById('u2');

var u92 = document.getElementById('u92');
gv_vAlignTable['u92'] = 'center';
var u83 = document.getElementById('u83');
gv_vAlignTable['u83'] = 'top';
var u130 = document.getElementById('u130');

var u129 = document.getElementById('u129');
gv_vAlignTable['u129'] = 'center';
var u95 = document.getElementById('u95');
gv_vAlignTable['u95'] = 'center';
var u22 = document.getElementById('u22');

var u13 = document.getElementById('u13');

var u52 = document.getElementById('u52');
gv_vAlignTable['u52'] = 'top';
var u43 = document.getElementById('u43');
gv_vAlignTable['u43'] = 'top';
var u0 = document.getElementById('u0');

var u3 = document.getElementById('u3');

var u47 = document.getElementById('u47');
gv_vAlignTable['u47'] = 'top';
var u68 = document.getElementById('u68');
gv_vAlignTable['u68'] = 'top';
var u90 = document.getElementById('u90');

var u73 = document.getElementById('u73');

var u84 = document.getElementById('u84');

var u20 = document.getElementById('u20');
gv_vAlignTable['u20'] = 'top';
var u50 = document.getElementById('u50');

var u128 = document.getElementById('u128');

u128.style.cursor = 'pointer';
if (bIE) u128.attachEvent("onclick", Clicku128);
else u128.addEventListener("click", Clicku128, true);
function Clicku128(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_estadistico_de_calificaciones.html" + GetQuerystring();

}

}

var u106 = document.getElementById('u106');
gv_vAlignTable['u106'] = 'center';
var u28 = document.getElementById('u28');

var u24 = document.getElementById('u24');

var u54 = document.getElementById('u54');
gv_vAlignTable['u54'] = 'top';
var u99 = document.getElementById('u99');

u99.style.cursor = 'pointer';
if (bIE) u99.attachEvent("onclick", Clicku99);
else u99.addEventListener("click", Clicku99, true);
function Clicku99(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u113 = document.getElementById('u113');
gv_vAlignTable['u113'] = 'center';
var u39 = document.getElementById('u39');
gv_vAlignTable['u39'] = 'top';
var u111 = document.getElementById('u111');

var u69 = document.getElementById('u69');

var u78 = document.getElementById('u78');

var u120 = document.getElementById('u120');

u120.style.cursor = 'pointer';
if (bIE) u120.attachEvent("onclick", Clicku120);
else u120.addEventListener("click", Clicku120, true);
function Clicku120(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_por_operador.html" + GetQuerystring();

}

}

var u131 = document.getElementById('u131');

u131.style.cursor = 'pointer';
if (bIE) u131.attachEvent("onclick", Clicku131);
else u131.addEventListener("click", Clicku131, true);
function Clicku131(e)
{
windowEvent = e;


if (true) {

	self.location.href="mis_inspecciones.html" + GetQuerystring();

}

}

var u114 = document.getElementById('u114');

var u4 = document.getElementById('u4');
gv_vAlignTable['u4'] = 'center';
var u94 = document.getElementById('u94');

var u6 = document.getElementById('u6');

var u96 = document.getElementById('u96');
gv_vAlignTable['u96'] = 'top';
var u61 = document.getElementById('u61');
gv_vAlignTable['u61'] = 'top';
var u91 = document.getElementById('u91');

u91.style.cursor = 'pointer';
if (bIE) u91.attachEvent("onclick", Clicku91);
else u91.addEventListener("click", Clicku91, true);
function Clicku91(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u90','hidden','fade',500);

}

}

var u35 = document.getElementById('u35');
gv_vAlignTable['u35'] = 'top';
var u26 = document.getElementById('u26');

var u65 = document.getElementById('u65');

var u56 = document.getElementById('u56');
gv_vAlignTable['u56'] = 'top';
var u116 = document.getElementById('u116');
gv_vAlignTable['u116'] = 'center';
var u127 = document.getElementById('u127');
gv_vAlignTable['u127'] = 'center';
var u105 = document.getElementById('u105');

u105.style.cursor = 'pointer';
if (bIE) u105.attachEvent("onclick", Clicku105);
else u105.addEventListener("click", Clicku105, true);
function Clicku105(e)
{
windowEvent = e;


if (true) {

	self.location.href="auditoria.html" + GetQuerystring();

}

}

if (bIE) u105.attachEvent("onmouseover", MouseOveru105);
else u105.addEventListener("mouseover", MouseOveru105, true);
function MouseOveru105(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u105',e)) return;
if (true) {

	SetPanelVisibility('u111','hidden','none',500);

	SetPanelVisibility('u114','hidden','none',500);

	SetPanelVisibility('u117','hidden','none',500);

	SetPanelVisibility('u130','hidden','none',500);

}

}

var u109 = document.getElementById('u109');

u109.style.cursor = 'pointer';
if (bIE) u109.attachEvent("onclick", Clicku109);
else u109.addEventListener("click", Clicku109, true);
function Clicku109(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

if (bIE) u109.attachEvent("onmouseover", MouseOveru109);
else u109.addEventListener("mouseover", MouseOveru109, true);
function MouseOveru109(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u109',e)) return;
if (true) {

	SetPanelVisibility('u117','','none',500);

	SetPanelVisibility('u114','hidden','none',500);

	SetPanelVisibility('u111','hidden','none',500);

	SetPanelVisibility('u130','hidden','none',500);

}

}

var u123 = document.getElementById('u123');
gv_vAlignTable['u123'] = 'center';
var u82 = document.getElementById('u82');

var u132 = document.getElementById('u132');
gv_vAlignTable['u132'] = 'center';
var u5 = document.getElementById('u5');
gv_vAlignTable['u5'] = 'top';
var u134 = document.getElementById('u134');

var u12 = document.getElementById('u12');
gv_vAlignTable['u12'] = 'top';
var u9 = document.getElementById('u9');

u9.style.cursor = 'pointer';
if (bIE) u9.attachEvent("onclick", Clicku9);
else u9.addEventListener("click", Clicku9, true);
function Clicku9(e)
{
windowEvent = e;


if (true) {

	self.location.href="datos_taller_artesano.html" + GetQuerystring();

}

}

var u42 = document.getElementById('u42');

var u33 = document.getElementById('u33');

var u72 = document.getElementById('u72');
gv_vAlignTable['u72'] = 'top';
var u63 = document.getElementById('u63');
gv_vAlignTable['u63'] = 'top';
var u18 = document.getElementById('u18');
gv_vAlignTable['u18'] = 'top';
var u48 = document.getElementById('u48');

var u110 = document.getElementById('u110');
gv_vAlignTable['u110'] = 'center';
var u67 = document.getElementById('u67');

var u88 = document.getElementById('u88');

var u57 = document.getElementById('u57');

var u125 = document.getElementById('u125');
gv_vAlignTable['u125'] = 'center';
var u101 = document.getElementById('u101');

u101.style.cursor = 'pointer';
if (bIE) u101.attachEvent("onclick", Clicku101);
else u101.addEventListener("click", Clicku101, true);
function Clicku101(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Usuarios.html" + GetQuerystring();

}

}

if (bIE) u101.attachEvent("onmouseover", MouseOveru101);
else u101.addEventListener("mouseover", MouseOveru101, true);
function MouseOveru101(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u101',e)) return;
if (true) {

	SetPanelVisibility('u111','','none',500);

	SetPanelVisibility('u114','hidden','none',500);

	SetPanelVisibility('u117','hidden','none',500);

	SetPanelVisibility('u130','','none',500);

}

}

var u10 = document.getElementById('u10');
gv_vAlignTable['u10'] = 'center';
var u40 = document.getElementById('u40');
gv_vAlignTable['u40'] = 'top';
var u70 = document.getElementById('u70');
gv_vAlignTable['u70'] = 'top';
var u14 = document.getElementById('u14');
gv_vAlignTable['u14'] = 'top';
var u44 = document.getElementById('u44');

var u117 = document.getElementById('u117');

var u74 = document.getElementById('u74');

var u29 = document.getElementById('u29');
gv_vAlignTable['u29'] = 'top';
var u59 = document.getElementById('u59');

var u98 = document.getElementById('u98');
gv_vAlignTable['u98'] = 'center';
var u80 = document.getElementById('u80');

var u121 = document.getElementById('u121');
gv_vAlignTable['u121'] = 'center';
if (window.OnLoad) OnLoad();
