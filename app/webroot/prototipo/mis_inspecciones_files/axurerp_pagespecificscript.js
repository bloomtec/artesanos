
var PageName = 'mis inspecciones';
var PageId = '68e9afc796214b1d97680798c1d4f8eb'
var PageUrl = 'mis_inspecciones.html'
document.title = 'mis inspecciones';
var PageNotes = 
{
"pageName":"mis inspecciones",
"showNotesNames":"False",
"Default":"<p style=\"text-align:left;\"><span style=\"\">Esta Página muestra todas las inspecciones con su estado que estan registradas para el usuario logueado, por defecto se muestran las del dia actual pero se va a poder filtrar fecha (fecha inicial, fecha final).<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">&nbsp;<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">&nbsp;<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">Se agrego botón para descargar comprobante y que el inspector pueda tener el archivo cuando vaya ha hacer la inspección<\/span><\/p>"}
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

widgetIdToHideFunction['u62'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u65','','none',500);

}

}
widgetIdToHideFunction['u71'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u74','','none',500);

}

}
var u21 = document.getElementById('u21');
gv_vAlignTable['u21'] = 'center';
var u86 = document.getElementById('u86');

u86.style.cursor = 'pointer';
if (bIE) u86.attachEvent("onclick", Clicku86);
else u86.addEventListener("click", Clicku86, true);
function Clicku86(e)
{
windowEvent = e;


if (true) {

	self.location.href="auditoria.html" + GetQuerystring();

}

}

if (bIE) u86.attachEvent("onmouseover", MouseOveru86);
else u86.addEventListener("mouseover", MouseOveru86, true);
function MouseOveru86(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u86',e)) return;
if (true) {

	SetPanelVisibility('u92','hidden','none',500);

	SetPanelVisibility('u95','hidden','none',500);

	SetPanelVisibility('u98','hidden','none',500);

	SetPanelVisibility('u111','hidden','none',500);

}

}

var u51 = document.getElementById('u51');
gv_vAlignTable['u51'] = 'top';
var u102 = document.getElementById('u102');
gv_vAlignTable['u102'] = 'center';
var u25 = document.getElementById('u25');

var u16 = document.getElementById('u16');

var u55 = document.getElementById('u55');
gv_vAlignTable['u55'] = 'top';
var u46 = document.getElementById('u46');
gv_vAlignTable['u46'] = 'top';
var u76 = document.getElementById('u76');
gv_vAlignTable['u76'] = 'center';
var u31 = document.getElementById('u31');
gv_vAlignTable['u31'] = 'center';
var u77 = document.getElementById('u77');
gv_vAlignTable['u77'] = 'top';
var u93 = document.getElementById('u93');

u93.style.cursor = 'pointer';
if (bIE) u93.attachEvent("onclick", Clicku93);
else u93.addEventListener("click", Clicku93, true);
function Clicku93(e)
{
windowEvent = e;


if (true) {

	self.location.href="agregar_usuario.html" + GetQuerystring();

}

}

var u107 = document.getElementById('u107');

u107.style.cursor = 'pointer';
if (bIE) u107.attachEvent("onclick", Clicku107);
else u107.addEventListener("click", Clicku107, true);
function Clicku107(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspeccion_por_estado_para_supervision.html" + GetQuerystring();

}

}

var u38 = document.getElementById('u38');

u38.style.cursor = 'pointer';
if (bIE) u38.attachEvent("onclick", Clicku38);
else u38.addEventListener("click", Clicku38, true);
function Clicku38(e)
{
windowEvent = e;


if (true) {

	self.location.href="revision_registro.html" + GetQuerystring();

}

}

var u32 = document.getElementById('u32');

u32.style.cursor = 'pointer';
if (bIE) u32.attachEvent("onclick", Clicku32);
else u32.addEventListener("click", Clicku32, true);
function Clicku32(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u117','','none',500);

}

}

var u23 = document.getElementById('u23');
gv_vAlignTable['u23'] = 'center';
var u62 = document.getElementById('u62');

var u53 = document.getElementById('u53');
gv_vAlignTable['u53'] = 'top';
var u87 = document.getElementById('u87');
gv_vAlignTable['u87'] = 'center';
var u1 = document.getElementById('u1');

var u119 = document.getElementById('u119');
gv_vAlignTable['u119'] = 'center';
var u27 = document.getElementById('u27');

var u7 = document.getElementById('u7');
gv_vAlignTable['u7'] = 'top';
var u66 = document.getElementById('u66');

var u112 = document.getElementById('u112');

u112.style.cursor = 'pointer';
if (bIE) u112.attachEvent("onclick", Clicku112);
else u112.addEventListener("click", Clicku112, true);
function Clicku112(e)
{
windowEvent = e;


if (true) {

	self.location.href="resources/reload.html#" + encodeURI(PageUrl + GetQuerystring());

}

}

var u115 = document.getElementById('u115');

var u104 = document.getElementById('u104');
gv_vAlignTable['u104'] = 'center';
var u30 = document.getElementById('u30');

u30.style.cursor = 'pointer';
if (bIE) u30.attachEvent("onclick", Clicku30);
else u30.addEventListener("click", Clicku30, true);
function Clicku30(e)
{
windowEvent = e;


if (true) {

	self.location.href="revision_registro.html" + GetQuerystring();

}

}

var u8 = document.getElementById('u8');

var u60 = document.getElementById('u60');
gv_vAlignTable['u60'] = 'top';
var u89 = document.getElementById('u89');
gv_vAlignTable['u89'] = 'center';
var u122 = document.getElementById('u122');
gv_vAlignTable['u122'] = 'center';
var u34 = document.getElementById('u34');

var u17 = document.getElementById('u17');

var u64 = document.getElementById('u64');
gv_vAlignTable['u64'] = 'center';
var u100 = document.getElementById('u100');
gv_vAlignTable['u100'] = 'center';
var u19 = document.getElementById('u19');

var u49 = document.getElementById('u49');
gv_vAlignTable['u49'] = 'top';
var u103 = document.getElementById('u103');

u103.style.cursor = 'pointer';
if (bIE) u103.attachEvent("onclick", Clicku103);
else u103.addEventListener("click", Clicku103, true);
function Clicku103(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_artesano.html" + GetQuerystring();

}

}

var u79 = document.getElementById('u79');
gv_vAlignTable['u79'] = 'center';
var u81 = document.getElementById('u81');
gv_vAlignTable['u81'] = 'center';
var u97 = document.getElementById('u97');
gv_vAlignTable['u97'] = 'center';
var u118 = document.getElementById('u118');

var u85 = document.getElementById('u85');
gv_vAlignTable['u85'] = 'center';
var u11 = document.getElementById('u11');

var u41 = document.getElementById('u41');
gv_vAlignTable['u41'] = 'center';
var u108 = document.getElementById('u108');
gv_vAlignTable['u108'] = 'center';
var u71 = document.getElementById('u71');

var u15 = document.getElementById('u15');
gv_vAlignTable['u15'] = 'center';
var u45 = document.getElementById('u45');
gv_vAlignTable['u45'] = 'top';
var u36 = document.getElementById('u36');
gv_vAlignTable['u36'] = 'center';
var u75 = document.getElementById('u75');

var u58 = document.getElementById('u58');
gv_vAlignTable['u58'] = 'top';
var u37 = document.getElementById('u37');

var u2 = document.getElementById('u2');
gv_vAlignTable['u2'] = 'center';
var u92 = document.getElementById('u92');

var u83 = document.getElementById('u83');
gv_vAlignTable['u83'] = 'center';
var u95 = document.getElementById('u95');

var u22 = document.getElementById('u22');

u22.style.cursor = 'pointer';
if (bIE) u22.attachEvent("onclick", Clicku22);
else u22.addEventListener("click", Clicku22, true);
function Clicku22(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u117','','none',500);

}

}

var u13 = document.getElementById('u13');
gv_vAlignTable['u13'] = 'center';
var u52 = document.getElementById('u52');
gv_vAlignTable['u52'] = 'top';
var u43 = document.getElementById('u43');
gv_vAlignTable['u43'] = 'center';
var u0 = document.getElementById('u0');
gv_vAlignTable['u0'] = 'top';
var u3 = document.getElementById('u3');

var u47 = document.getElementById('u47');
gv_vAlignTable['u47'] = 'top';
var u68 = document.getElementById('u68');
gv_vAlignTable['u68'] = 'top';
var u90 = document.getElementById('u90');

u90.style.cursor = 'pointer';
if (bIE) u90.attachEvent("onclick", Clicku90);
else u90.addEventListener("click", Clicku90, true);
function Clicku90(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

if (bIE) u90.attachEvent("onmouseover", MouseOveru90);
else u90.addEventListener("mouseover", MouseOveru90, true);
function MouseOveru90(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u90',e)) return;
if (true) {

	SetPanelVisibility('u98','','none',500);

	SetPanelVisibility('u95','hidden','none',500);

	SetPanelVisibility('u92','hidden','none',500);

	SetPanelVisibility('u111','hidden','none',500);

}

}

var u73 = document.getElementById('u73');
gv_vAlignTable['u73'] = 'center';
var u84 = document.getElementById('u84');

u84.style.cursor = 'pointer';
if (bIE) u84.attachEvent("onclick", Clicku84);
else u84.addEventListener("click", Clicku84, true);
function Clicku84(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Artesanos.html" + GetQuerystring();

}

}

if (bIE) u84.attachEvent("onmouseover", MouseOveru84);
else u84.addEventListener("mouseover", MouseOveru84, true);
function MouseOveru84(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u84',e)) return;
if (true) {

	SetPanelVisibility('u95','','none',500);

	SetPanelVisibility('u98','hidden','none',500);

	SetPanelVisibility('u92','hidden','none',500);

	SetPanelVisibility('u111','hidden','none',500);

}

}

var u20 = document.getElementById('u20');

u20.style.cursor = 'pointer';
if (bIE) u20.attachEvent("onclick", Clicku20);
else u20.addEventListener("click", Clicku20, true);
function Clicku20(e)
{
windowEvent = e;


if (true) {

	self.location.href="revision_registro.html" + GetQuerystring();

}

}

var u50 = document.getElementById('u50');
gv_vAlignTable['u50'] = 'top';
var u106 = document.getElementById('u106');
gv_vAlignTable['u106'] = 'center';
var u28 = document.getElementById('u28');
gv_vAlignTable['u28'] = 'center';
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

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

var u113 = document.getElementById('u113');
gv_vAlignTable['u113'] = 'center';
var u39 = document.getElementById('u39');
gv_vAlignTable['u39'] = 'center';
var u111 = document.getElementById('u111');

var u69 = document.getElementById('u69');
gv_vAlignTable['u69'] = 'top';
var u78 = document.getElementById('u78');

u78.style.cursor = 'pointer';
if (bIE) u78.attachEvent("onclick", Clicku78);
else u78.addEventListener("click", Clicku78, true);
function Clicku78(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u120 = document.getElementById('u120');
gv_vAlignTable['u120'] = 'top';
var u114 = document.getElementById('u114');

var u4 = document.getElementById('u4');
gv_vAlignTable['u4'] = 'top';
var u94 = document.getElementById('u94');
gv_vAlignTable['u94'] = 'center';
var u6 = document.getElementById('u6');

var u96 = document.getElementById('u96');

u96.style.cursor = 'pointer';
if (bIE) u96.attachEvent("onclick", Clicku96);
else u96.addEventListener("click", Clicku96, true);
function Clicku96(e)
{
windowEvent = e;


if (true) {

	self.location.href="registrar_artesano.html" + GetQuerystring();

}

}

var u61 = document.getElementById('u61');

if (bIE) u61.attachEvent("onfocus", Focusu61);
else u61.addEventListener("focus", Focusu61, true);
function Focusu61(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u62','','fade',500);

}

}

var u91 = document.getElementById('u91');
gv_vAlignTable['u91'] = 'center';
var u35 = document.getElementById('u35');

var u26 = document.getElementById('u26');

var u65 = document.getElementById('u65');

var u56 = document.getElementById('u56');
gv_vAlignTable['u56'] = 'top';
var u116 = document.getElementById('u116');
gv_vAlignTable['u116'] = 'center';
var u105 = document.getElementById('u105');

u105.style.cursor = 'pointer';
if (bIE) u105.attachEvent("onclick", Clicku105);
else u105.addEventListener("click", Clicku105, true);
function Clicku105(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspecciones.html" + GetQuerystring();

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

	self.location.href="reporte_estadistico_de_calificaciones.html" + GetQuerystring();

}

}

var u82 = document.getElementById('u82');

u82.style.cursor = 'pointer';
if (bIE) u82.attachEvent("onclick", Clicku82);
else u82.addEventListener("click", Clicku82, true);
function Clicku82(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Usuarios.html" + GetQuerystring();

}

}

if (bIE) u82.attachEvent("onmouseover", MouseOveru82);
else u82.addEventListener("mouseover", MouseOveru82, true);
function MouseOveru82(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u82',e)) return;
if (true) {

	SetPanelVisibility('u92','','none',500);

	SetPanelVisibility('u95','hidden','none',500);

	SetPanelVisibility('u98','hidden','none',500);

	SetPanelVisibility('u111','','none',500);

}

}

var u5 = document.getElementById('u5');

var u12 = document.getElementById('u12');

u12.style.cursor = 'pointer';
if (bIE) u12.attachEvent("onclick", Clicku12);
else u12.addEventListener("click", Clicku12, true);
function Clicku12(e)
{
windowEvent = e;


if (true) {

	self.location.href="revision_registro.html" + GetQuerystring();

}

}

var u9 = document.getElementById('u9');

var u42 = document.getElementById('u42');

var u33 = document.getElementById('u33');
gv_vAlignTable['u33'] = 'center';
var u72 = document.getElementById('u72');

u72.style.cursor = 'pointer';
if (bIE) u72.attachEvent("onclick", Clicku72);
else u72.addEventListener("click", Clicku72, true);
function Clicku72(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u71','hidden','fade',500);

}

}

var u63 = document.getElementById('u63');

u63.style.cursor = 'pointer';
if (bIE) u63.attachEvent("onclick", Clicku63);
else u63.addEventListener("click", Clicku63, true);
function Clicku63(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u62','hidden','fade',500);

}

}

var u18 = document.getElementById('u18');
gv_vAlignTable['u18'] = 'center';
var u48 = document.getElementById('u48');
gv_vAlignTable['u48'] = 'top';
var u110 = document.getElementById('u110');
gv_vAlignTable['u110'] = 'center';
var u67 = document.getElementById('u67');
gv_vAlignTable['u67'] = 'center';
var u88 = document.getElementById('u88');

u88.style.cursor = 'pointer';
if (bIE) u88.attachEvent("onclick", Clicku88);
else u88.addEventListener("click", Clicku88, true);
function Clicku88(e)
{
windowEvent = e;


if (true) {

	self.location.href="parametros.html" + GetQuerystring();

}

}

if (bIE) u88.attachEvent("onmouseover", MouseOveru88);
else u88.addEventListener("mouseover", MouseOveru88, true);
function MouseOveru88(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u88',e)) return;
if (true) {

	SetPanelVisibility('u92','hidden','none',500);

	SetPanelVisibility('u98','hidden','none',500);

	SetPanelVisibility('u95','hidden','none',500);

	SetPanelVisibility('u111','hidden','none',500);

}

}

var u57 = document.getElementById('u57');
gv_vAlignTable['u57'] = 'top';
var u101 = document.getElementById('u101');

u101.style.cursor = 'pointer';
if (bIE) u101.attachEvent("onclick", Clicku101);
else u101.addEventListener("click", Clicku101, true);
function Clicku101(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_por_operador.html" + GetQuerystring();

}

}

var u10 = document.getElementById('u10');
gv_vAlignTable['u10'] = 'center';
var u40 = document.getElementById('u40');

u40.style.cursor = 'pointer';
if (bIE) u40.attachEvent("onclick", Clicku40);
else u40.addEventListener("click", Clicku40, true);
function Clicku40(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u117','','none',500);

}

}

var u70 = document.getElementById('u70');

if (bIE) u70.attachEvent("onfocus", Focusu70);
else u70.addEventListener("focus", Focusu70, true);
function Focusu70(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u71','','fade',500);

}

}

var u14 = document.getElementById('u14');

u14.style.cursor = 'pointer';
if (bIE) u14.attachEvent("onclick", Clicku14);
else u14.addEventListener("click", Clicku14, true);
function Clicku14(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u117','','none',500);

}

}

var u44 = document.getElementById('u44');
gv_vAlignTable['u44'] = 'top';
var u117 = document.getElementById('u117');

var u74 = document.getElementById('u74');

var u29 = document.getElementById('u29');

var u59 = document.getElementById('u59');
gv_vAlignTable['u59'] = 'top';
var u98 = document.getElementById('u98');

var u80 = document.getElementById('u80');

u80.style.cursor = 'pointer';
if (bIE) u80.attachEvent("onclick", Clicku80);
else u80.addEventListener("click", Clicku80, true);
function Clicku80(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u121 = document.getElementById('u121');

u121.style.cursor = 'pointer';
if (bIE) u121.attachEvent("onclick", Clicku121);
else u121.addEventListener("click", Clicku121, true);
function Clicku121(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u117','hidden','none',500);

}

}

if (window.OnLoad) OnLoad();
