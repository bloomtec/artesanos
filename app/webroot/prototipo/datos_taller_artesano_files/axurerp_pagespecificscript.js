
var PageName = 'datos taller artesano';
var PageId = '264082bcc2634a80bc1274450bc30aaf'
var PageUrl = 'datos_taller_artesano.html'
document.title = 'datos taller artesano';
var PageNotes = 
{
"pageName":"datos taller artesano",
"showNotesNames":"False",
"validaciones":"<p style=\"text-align:left;\"><span style=\"\">El capital de inversión máxima es la suma de Maquinaria y Herramientas, Materia Prima en Stock y los Productos Elaborados en Stock, estos campos se basan en las cantidades que se poseen al momento de la inspección.<\/span><\/p><p style=\"text-align:left;\"><span style=\"\">Este capital no debe exceder los USD$ 87500 (valor que equivale al 25% del capital de la Pequeña Industria), de caso de hacerlo, la calificación es inválida.<\/span><\/p>"}
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

widgetIdToHideFunction['u82'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u85','','none',500);

}

}
widgetIdToHideFunction['u74'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u77','','none',500);

}

}
widgetIdToHideFunction['u66'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u69','','none',500);

}

}
widgetIdToHideFunction['u137'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u140','','none',500);

}

}
widgetIdToHideFunction['u90'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u93','','none',500);

}

}
widgetIdToHideFunction['u153'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u156','','none',500);

}

}
widgetIdToHideFunction['u145'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u148','','none',500);

}

}
widgetIdToHideFunction['u121'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u124','','none',500);

}

}
widgetIdToHideFunction['u129'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u132','','none',500);

}

}
widgetIdToHideFunction['u98'] = function() {
var e = windowEvent;

if (true) {

	SetPanelVisibility('u101','','none',500);

}

}
var u115 = document.getElementById('u115');

var u122 = document.getElementById('u122');

u122.style.cursor = 'pointer';
if (bIE) u122.attachEvent("onclick", Clicku122);
else u122.addEventListener("click", Clicku122, true);
function Clicku122(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u121','hidden','fade',500);

}

}

var u21 = document.getElementById('u21');
gv_vAlignTable['u21'] = 'top';
var u32 = document.getElementById('u32');

var u156 = document.getElementById('u156');

var u130 = document.getElementById('u130');

u130.style.cursor = 'pointer';
if (bIE) u130.attachEvent("onclick", Clicku130);
else u130.addEventListener("click", Clicku130, true);
function Clicku130(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u129','hidden','fade',500);

}

}

var u7 = document.getElementById('u7');
gv_vAlignTable['u7'] = 'top';
var u2 = document.getElementById('u2');

var u79 = document.getElementById('u79');
gv_vAlignTable['u79'] = 'center';
var u4 = document.getElementById('u4');
gv_vAlignTable['u4'] = 'top';
var u153 = document.getElementById('u153');

var u140 = document.getElementById('u140');

var u17 = document.getElementById('u17');
gv_vAlignTable['u17'] = 'top';
var u135 = document.getElementById('u135');
gv_vAlignTable['u135'] = 'top';
var u151 = document.getElementById('u151');
gv_vAlignTable['u151'] = 'top';
var u42 = document.getElementById('u42');

var u159 = document.getElementById('u159');
gv_vAlignTable['u159'] = 'top';
var u55 = document.getElementById('u55');

var u101 = document.getElementById('u101');

var u186 = document.getElementById('u186');
gv_vAlignTable['u186'] = 'center';
var u14 = document.getElementById('u14');
gv_vAlignTable['u14'] = 'top';
var u48 = document.getElementById('u48');

var u105 = document.getElementById('u105');

var u27 = document.getElementById('u27');

u27.style.cursor = 'pointer';
if (bIE) u27.attachEvent("onclick", Clicku27);
else u27.addEventListener("click", Clicku27, true);
function Clicku27(e)
{
windowEvent = e;


if (true) {

	self.location.href="datos_trabajadores_artesano.html" + GetQuerystring();

}

}

var u138 = document.getElementById('u138');

u138.style.cursor = 'pointer';
if (bIE) u138.attachEvent("onclick", Clicku138);
else u138.addEventListener("click", Clicku138, true);
function Clicku138(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u137','hidden','fade',500);

}

}

var u52 = document.getElementById('u52');

var u20 = document.getElementById('u20');
gv_vAlignTable['u20'] = 'top';
var u67 = document.getElementById('u67');

u67.style.cursor = 'pointer';
if (bIE) u67.attachEvent("onclick", Clicku67);
else u67.addEventListener("click", Clicku67, true);
function Clicku67(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u66','hidden','fade',500);

}

}

var u65 = document.getElementById('u65');

if (bIE) u65.attachEvent("onfocus", Focusu65);
else u65.addEventListener("focus", Focusu65, true);
function Focusu65(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u66','','fade',500);

}

}

var u120 = document.getElementById('u120');

if (bIE) u120.attachEvent("onfocus", Focusu120);
else u120.addEventListener("focus", Focusu120, true);
function Focusu120(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u121','','fade',500);

}

}

var u152 = document.getElementById('u152');

if (bIE) u152.attachEvent("onfocus", Focusu152);
else u152.addEventListener("focus", Focusu152, true);
function Focusu152(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u153','','fade',500);

}

}

var u110 = document.getElementById('u110');

var u6 = document.getElementById('u6');
gv_vAlignTable['u6'] = 'top';
var u205 = document.getElementById('u205');

var u108 = document.getElementById('u108');

var u37 = document.getElementById('u37');

var u62 = document.getElementById('u62');

var u141 = document.getElementById('u141');

var u11 = document.getElementById('u11');
gv_vAlignTable['u11'] = 'top';
var u75 = document.getElementById('u75');

u75.style.cursor = 'pointer';
if (bIE) u75.attachEvent("onclick", Clicku75);
else u75.addEventListener("click", Clicku75, true);
function Clicku75(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u74','hidden','fade',500);

}

}

var u133 = document.getElementById('u133');

var u200 = document.getElementById('u200');

var u34 = document.getElementById('u34');

var u68 = document.getElementById('u68');
gv_vAlignTable['u68'] = 'center';
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

var u39 = document.getElementById('u39');

var u47 = document.getElementById('u47');

var u184 = document.getElementById('u184');
gv_vAlignTable['u184'] = 'center';
var u185 = document.getElementById('u185');

u185.style.cursor = 'pointer';
if (bIE) u185.attachEvent("onclick", Clicku185);
else u185.addEventListener("click", Clicku185, true);
function Clicku185(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_artesano.html" + GetQuerystring();

}

}

var u72 = document.getElementById('u72');
gv_vAlignTable['u72'] = 'top';
var u103 = document.getElementById('u103');
gv_vAlignTable['u103'] = 'center';
var u164 = document.getElementById('u164');

u164.style.cursor = 'pointer';
if (bIE) u164.attachEvent("onclick", Clicku164);
else u164.addEventListener("click", Clicku164, true);
function Clicku164(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Usuarios.html" + GetQuerystring();

}

}

if (bIE) u164.attachEvent("onmouseover", MouseOveru164);
else u164.addEventListener("mouseover", MouseOveru164, true);
function MouseOveru164(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u164',e)) return;
if (true) {

	SetPanelVisibility('u174','','none',500);

	SetPanelVisibility('u177','hidden','none',500);

	SetPanelVisibility('u180','hidden','none',500);

	SetPanelVisibility('u193','','none',500);

}

}

var u99 = document.getElementById('u99');

u99.style.cursor = 'pointer';
if (bIE) u99.attachEvent("onclick", Clicku99);
else u99.addEventListener("click", Clicku99, true);
function Clicku99(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u98','hidden','fade',500);

}

}

var u66 = document.getElementById('u66');

var u112 = document.getElementById('u112');

var u44 = document.getElementById('u44');

var u78 = document.getElementById('u78');

var u179 = document.getElementById('u179');
gv_vAlignTable['u179'] = 'center';
var u57 = document.getElementById('u57');
gv_vAlignTable['u57'] = 'top';
var u191 = document.getElementById('u191');

u191.style.cursor = 'pointer';
if (bIE) u191.attachEvent("onclick", Clicku191);
else u191.addEventListener("click", Clicku191, true);
function Clicku191(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_estadistico_de_calificaciones.html" + GetQuerystring();

}

}

var u119 = document.getElementById('u119');

var u16 = document.getElementById('u16');
gv_vAlignTable['u16'] = 'top';
var u203 = document.getElementById('u203');

var u125 = document.getElementById('u125');

var u41 = document.getElementById('u41');

var u172 = document.getElementById('u172');

u172.style.cursor = 'pointer';
if (bIE) u172.attachEvent("onclick", Clicku172);
else u172.addEventListener("click", Clicku172, true);
function Clicku172(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

if (bIE) u172.attachEvent("onmouseover", MouseOveru172);
else u172.addEventListener("mouseover", MouseOveru172, true);
function MouseOveru172(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u172',e)) return;
if (true) {

	SetPanelVisibility('u180','','none',500);

	SetPanelVisibility('u177','hidden','none',500);

	SetPanelVisibility('u174','hidden','none',500);

	SetPanelVisibility('u193','hidden','none',500);

}

}

var u149 = document.getElementById('u149');

var u54 = document.getElementById('u54');

var u118 = document.getElementById('u118');

var u197 = document.getElementById('u197');

var u88 = document.getElementById('u88');
gv_vAlignTable['u88'] = 'top';
var u189 = document.getElementById('u189');

u189.style.cursor = 'pointer';
if (bIE) u189.attachEvent("onclick", Clicku189);
else u189.addEventListener("click", Clicku189, true);
function Clicku189(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspeccion_por_estado_para_supervision.html" + GetQuerystring();

}

}

var u38 = document.getElementById('u38');

var u176 = document.getElementById('u176');
gv_vAlignTable['u176'] = 'center';
var u26 = document.getElementById('u26');
gv_vAlignTable['u26'] = 'center';
var u174 = document.getElementById('u174');

var u128 = document.getElementById('u128');

if (bIE) u128.attachEvent("onfocus", Focusu128);
else u128.addEventListener("focus", Focusu128, true);
function Focusu128(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u129','','fade',500);

}

}

var u85 = document.getElementById('u85');

var u51 = document.getElementById('u51');

var u182 = document.getElementById('u182');
gv_vAlignTable['u182'] = 'center';
var u10 = document.getElementById('u10');
gv_vAlignTable['u10'] = 'top';
var u100 = document.getElementById('u100');
gv_vAlignTable['u100'] = 'center';
var u23 = document.getElementById('u23');

var u144 = document.getElementById('u144');

if (bIE) u144.attachEvent("onfocus", Focusu144);
else u144.addEventListener("focus", Focusu144, true);
function Focusu144(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u145','','fade',500);

}

}

var u202 = document.getElementById('u202');

var u166 = document.getElementById('u166');

u166.style.cursor = 'pointer';
if (bIE) u166.attachEvent("onclick", Clicku166);
else u166.addEventListener("click", Clicku166, true);
function Clicku166(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Artesanos.html" + GetQuerystring();

}

}

if (bIE) u166.attachEvent("onmouseover", MouseOveru166);
else u166.addEventListener("mouseover", MouseOveru166, true);
function MouseOveru166(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u166',e)) return;
if (true) {

	SetPanelVisibility('u177','','none',500);

	SetPanelVisibility('u180','hidden','none',500);

	SetPanelVisibility('u174','hidden','none',500);

	SetPanelVisibility('u193','hidden','none',500);

}

}

var u82 = document.getElementById('u82');

var u36 = document.getElementById('u36');

var u30 = document.getElementById('u30');

var u95 = document.getElementById('u95');
gv_vAlignTable['u95'] = 'center';
var u61 = document.getElementById('u61');

var u195 = document.getElementById('u195');
gv_vAlignTable['u195'] = 'center';
var u116 = document.getElementById('u116');

var u158 = document.getElementById('u158');
gv_vAlignTable['u158'] = 'center';
var u74 = document.getElementById('u74');

var u123 = document.getElementById('u123');
gv_vAlignTable['u123'] = 'center';
var u114 = document.getElementById('u114');

var u33 = document.getElementById('u33');

var u160 = document.getElementById('u160');

u160.style.cursor = 'pointer';
if (bIE) u160.attachEvent("onclick", Clicku160);
else u160.addEventListener("click", Clicku160, true);
function Clicku160(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u157 = document.getElementById('u157');

var u92 = document.getElementById('u92');
gv_vAlignTable['u92'] = 'center';
var u46 = document.getElementById('u46');

var u126 = document.getElementById('u126');
gv_vAlignTable['u126'] = 'center';
var u71 = document.getElementById('u71');
gv_vAlignTable['u71'] = 'center';
var u181 = document.getElementById('u181');

u181.style.cursor = 'pointer';
if (bIE) u181.attachEvent("onclick", Clicku181);
else u181.addEventListener("click", Clicku181, true);
function Clicku181(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

var u198 = document.getElementById('u198');

var u5 = document.getElementById('u5');
gv_vAlignTable['u5'] = 'top';
var u98 = document.getElementById('u98');

var u127 = document.getElementById('u127');
gv_vAlignTable['u127'] = 'top';
var u43 = document.getElementById('u43');

var u169 = document.getElementById('u169');
gv_vAlignTable['u169'] = 'center';
var u56 = document.getElementById('u56');

var u150 = document.getElementById('u150');
gv_vAlignTable['u150'] = 'center';
var u187 = document.getElementById('u187');

u187.style.cursor = 'pointer';
if (bIE) u187.attachEvent("onclick", Clicku187);
else u187.addEventListener("click", Clicku187, true);
function Clicku187(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspecciones.html" + GetQuerystring();

}

}

var u142 = document.getElementById('u142');
gv_vAlignTable['u142'] = 'center';
var u106 = document.getElementById('u106');

var u168 = document.getElementById('u168');

u168.style.cursor = 'pointer';
if (bIE) u168.attachEvent("onclick", Clicku168);
else u168.addEventListener("click", Clicku168, true);
function Clicku168(e)
{
windowEvent = e;


if (true) {

	self.location.href="auditoria.html" + GetQuerystring();

}

}

if (bIE) u168.attachEvent("onmouseover", MouseOveru168);
else u168.addEventListener("mouseover", MouseOveru168, true);
function MouseOveru168(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u168',e)) return;
if (true) {

	SetPanelVisibility('u174','hidden','none',500);

	SetPanelVisibility('u177','hidden','none',500);

	SetPanelVisibility('u180','hidden','none',500);

	SetPanelVisibility('u193','hidden','none',500);

}

}

var u154 = document.getElementById('u154');

u154.style.cursor = 'pointer';
if (bIE) u154.attachEvent("onclick", Clicku154);
else u154.addEventListener("click", Clicku154, true);
function Clicku154(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u153','hidden','fade',500);

}

}

var u40 = document.getElementById('u40');

var u139 = document.getElementById('u139');
gv_vAlignTable['u139'] = 'center';
var u87 = document.getElementById('u87');
gv_vAlignTable['u87'] = 'center';
var u53 = document.getElementById('u53');

var u193 = document.getElementById('u193');

var u104 = document.getElementById('u104');
gv_vAlignTable['u104'] = 'top';
var u192 = document.getElementById('u192');
gv_vAlignTable['u192'] = 'center';
var u121 = document.getElementById('u121');

var u19 = document.getElementById('u19');
gv_vAlignTable['u19'] = 'top';
var u155 = document.getElementById('u155');
gv_vAlignTable['u155'] = 'center';
var u206 = document.getElementById('u206');

var u109 = document.getElementById('u109');

var u84 = document.getElementById('u84');
gv_vAlignTable['u84'] = 'center';
var u50 = document.getElementById('u50');

var u97 = document.getElementById('u97');

if (bIE) u97.attachEvent("onfocus", Focusu97);
else u97.addEventListener("focus", Focusu97, true);
function Focusu97(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u98','','fade',500);

}

}

var u63 = document.getElementById('u63');

var u170 = document.getElementById('u170');

u170.style.cursor = 'pointer';
if (bIE) u170.attachEvent("onclick", Clicku170);
else u170.addEventListener("click", Clicku170, true);
function Clicku170(e)
{
windowEvent = e;


if (true) {

	self.location.href="parametros.html" + GetQuerystring();

}

}

if (bIE) u170.attachEvent("onmouseover", MouseOveru170);
else u170.addEventListener("mouseover", MouseOveru170, true);
function MouseOveru170(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u170',e)) return;
if (true) {

	SetPanelVisibility('u174','hidden','none',500);

	SetPanelVisibility('u180','hidden','none',500);

	SetPanelVisibility('u177','hidden','none',500);

	SetPanelVisibility('u193','hidden','none',500);

}

}

var u76 = document.getElementById('u76');
gv_vAlignTable['u76'] = 'center';
var u134 = document.getElementById('u134');
gv_vAlignTable['u134'] = 'center';
var u81 = document.getElementById('u81');

if (bIE) u81.attachEvent("onfocus", Focusu81);
else u81.addEventListener("focus", Focusu81, true);
function Focusu81(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u82','','fade',500);

}

}

var u177 = document.getElementById('u177');

var u94 = document.getElementById('u94');

var u60 = document.getElementById('u60');

var u190 = document.getElementById('u190');
gv_vAlignTable['u190'] = 'center';
var u102 = document.getElementById('u102');

var u9 = document.getElementById('u9');

var u73 = document.getElementById('u73');

if (bIE) u73.attachEvent("onfocus", Focusu73);
else u73.addEventListener("focus", Focusu73, true);
function Focusu73(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u74','','fade',500);

}

}

var u69 = document.getElementById('u69');

var u147 = document.getElementById('u147');
gv_vAlignTable['u147'] = 'center';
var u163 = document.getElementById('u163');
gv_vAlignTable['u163'] = 'center';
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

var u131 = document.getElementById('u131');
gv_vAlignTable['u131'] = 'center';
var u64 = document.getElementById('u64');

var u70 = document.getElementById('u70');

var u24 = document.getElementById('u24');
gv_vAlignTable['u24'] = 'center';
var u188 = document.getElementById('u188');
gv_vAlignTable['u188'] = 'center';
var u162 = document.getElementById('u162');

u162.style.cursor = 'pointer';
if (bIE) u162.attachEvent("onclick", Clicku162);
else u162.addEventListener("click", Clicku162, true);
function Clicku162(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u204 = document.getElementById('u204');

var u117 = document.getElementById('u117');

var u13 = document.getElementById('u13');
gv_vAlignTable['u13'] = 'top';
var u113 = document.getElementById('u113');

var u29 = document.getElementById('u29');

var u132 = document.getElementById('u132');

var u175 = document.getElementById('u175');

u175.style.cursor = 'pointer';
if (bIE) u175.attachEvent("onclick", Clicku175);
else u175.addEventListener("click", Clicku175, true);
function Clicku175(e)
{
windowEvent = e;


if (true) {

	self.location.href="agregar_usuario.html" + GetQuerystring();

}

}

var u129 = document.getElementById('u129');

var u86 = document.getElementById('u86');

var u58 = document.getElementById('u58');
gv_vAlignTable['u58'] = 'top';
var u183 = document.getElementById('u183');

u183.style.cursor = 'pointer';
if (bIE) u183.attachEvent("onclick", Clicku183);
else u183.addEventListener("click", Clicku183, true);
function Clicku183(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_por_operador.html" + GetQuerystring();

}

}

var u173 = document.getElementById('u173');
gv_vAlignTable['u173'] = 'center';
var u111 = document.getElementById('u111');

var u171 = document.getElementById('u171');
gv_vAlignTable['u171'] = 'center';
var u0 = document.getElementById('u0');

var u31 = document.getElementById('u31');

var u83 = document.getElementById('u83');

u83.style.cursor = 'pointer';
if (bIE) u83.attachEvent("onclick", Clicku83);
else u83.addEventListener("click", Clicku83, true);
function Clicku83(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u82','hidden','fade',500);

}

}

var u178 = document.getElementById('u178');

u178.style.cursor = 'pointer';
if (bIE) u178.attachEvent("onclick", Clicku178);
else u178.addEventListener("click", Clicku178, true);
function Clicku178(e)
{
windowEvent = e;


if (true) {

	self.location.href="registrar_artesano.html" + GetQuerystring();

}

}

var u8 = document.getElementById('u8');

var u3 = document.getElementById('u3');
gv_vAlignTable['u3'] = 'top';
var u96 = document.getElementById('u96');
gv_vAlignTable['u96'] = 'top';
var u146 = document.getElementById('u146');

u146.style.cursor = 'pointer';
if (bIE) u146.attachEvent("onclick", Clicku146);
else u146.addEventListener("click", Clicku146, true);
function Clicku146(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u145','hidden','fade',500);

}

}

var u196 = document.getElementById('u196');

var u15 = document.getElementById('u15');
gv_vAlignTable['u15'] = 'top';
var u49 = document.getElementById('u49');

var u124 = document.getElementById('u124');

var u80 = document.getElementById('u80');
gv_vAlignTable['u80'] = 'top';
var u1 = document.getElementById('u1');
gv_vAlignTable['u1'] = 'center';
var u148 = document.getElementById('u148');

var u93 = document.getElementById('u93');

var u167 = document.getElementById('u167');
gv_vAlignTable['u167'] = 'center';
var u145 = document.getElementById('u145');

var u12 = document.getElementById('u12');
gv_vAlignTable['u12'] = 'top';
var u201 = document.getElementById('u201');

var u165 = document.getElementById('u165');
gv_vAlignTable['u165'] = 'center';
var u199 = document.getElementById('u199');

var u25 = document.getElementById('u25');

u25.style.cursor = 'pointer';
if (bIE) u25.attachEvent("onclick", Clicku25);
else u25.addEventListener("click", Clicku25, true);
function Clicku25(e)
{
windowEvent = e;


if (true) {

	self.location.href="agregar_usuario.html" + GetQuerystring();

}

}

var u59 = document.getElementById('u59');
gv_vAlignTable['u59'] = 'top';
var u137 = document.getElementById('u137');

var u90 = document.getElementById('u90');

var u18 = document.getElementById('u18');
gv_vAlignTable['u18'] = 'top';
var u161 = document.getElementById('u161');
gv_vAlignTable['u161'] = 'center';
var u45 = document.getElementById('u45');

var u77 = document.getElementById('u77');

var u22 = document.getElementById('u22');
gv_vAlignTable['u22'] = 'top';
var u143 = document.getElementById('u143');
gv_vAlignTable['u143'] = 'top';
var u107 = document.getElementById('u107');

var u35 = document.getElementById('u35');

var u136 = document.getElementById('u136');

if (bIE) u136.attachEvent("onfocus", Focusu136);
else u136.addEventListener("focus", Focusu136, true);
function Focusu136(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u137','','fade',500);

}

}

var u180 = document.getElementById('u180');

var u28 = document.getElementById('u28');
gv_vAlignTable['u28'] = 'center';
var u194 = document.getElementById('u194');

u194.style.cursor = 'pointer';
if (bIE) u194.attachEvent("onclick", Clicku194);
else u194.addEventListener("click", Clicku194, true);
function Clicku194(e)
{
windowEvent = e;


if (true) {

	self.location.href="mis_inspecciones.html" + GetQuerystring();

}

}

if (window.OnLoad) OnLoad();
