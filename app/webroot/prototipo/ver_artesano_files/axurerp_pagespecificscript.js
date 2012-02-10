
var PageName = 'ver artesano';
var PageId = 'c4ae1f8d6fc74f0091cbed7492c39213'
var PageUrl = 'ver_artesano.html'
document.title = 'ver artesano';
var PageNotes = 
{
"pageName":"ver artesano",
"showNotesNames":"False"}
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

var u115 = document.getElementById('u115');
gv_vAlignTable['u115'] = 'top';
var u122 = document.getElementById('u122');
gv_vAlignTable['u122'] = 'top';
var u21 = document.getElementById('u21');
gv_vAlignTable['u21'] = 'top';
var u32 = document.getElementById('u32');

var u156 = document.getElementById('u156');
gv_vAlignTable['u156'] = 'top';
var u130 = document.getElementById('u130');

var u7 = document.getElementById('u7');
gv_vAlignTable['u7'] = 'top';
var u2 = document.getElementById('u2');
gv_vAlignTable['u2'] = 'center';
var u79 = document.getElementById('u79');

var u4 = document.getElementById('u4');
gv_vAlignTable['u4'] = 'center';
var u153 = document.getElementById('u153');
gv_vAlignTable['u153'] = 'top';
var u140 = document.getElementById('u140');

var u17 = document.getElementById('u17');
gv_vAlignTable['u17'] = 'top';
var u135 = document.getElementById('u135');
gv_vAlignTable['u135'] = 'top';
var u151 = document.getElementById('u151');
gv_vAlignTable['u151'] = 'top';
var u42 = document.getElementById('u42');
gv_vAlignTable['u42'] = 'top';
var u159 = document.getElementById('u159');
gv_vAlignTable['u159'] = 'top';
var u55 = document.getElementById('u55');
gv_vAlignTable['u55'] = 'top';
var u101 = document.getElementById('u101');

var u14 = document.getElementById('u14');
gv_vAlignTable['u14'] = 'top';
var u48 = document.getElementById('u48');
gv_vAlignTable['u48'] = 'top';
var u105 = document.getElementById('u105');
gv_vAlignTable['u105'] = 'center';
var u27 = document.getElementById('u27');
gv_vAlignTable['u27'] = 'top';
var u138 = document.getElementById('u138');

u138.style.cursor = 'pointer';
if (bIE) u138.attachEvent("onclick", Clicku138);
else u138.addEventListener("click", Clicku138, true);
function Clicku138(e)
{
windowEvent = e;


if (true) {

	BringToFront("u29");

	BringToFront("u140");

	BringToFront("u143");

	BringToFront("u146");

	SetPanelVisibility('u29','','none',500);

	SetPanelVisibility('u130','hidden','none',500);

	SetPanelVisibility('u101','hidden','none',500);

	SetPanelVisibility('u0','hidden','none',500);

}

}

var u52 = document.getElementById('u52');
gv_vAlignTable['u52'] = 'top';
var u20 = document.getElementById('u20');
gv_vAlignTable['u20'] = 'top';
var u67 = document.getElementById('u67');
gv_vAlignTable['u67'] = 'center';
var u65 = document.getElementById('u65');
gv_vAlignTable['u65'] = 'center';
var u120 = document.getElementById('u120');
gv_vAlignTable['u120'] = 'top';
var u152 = document.getElementById('u152');
gv_vAlignTable['u152'] = 'top';
var u110 = document.getElementById('u110');
gv_vAlignTable['u110'] = 'top';
var u6 = document.getElementById('u6');
gv_vAlignTable['u6'] = 'top';
var u108 = document.getElementById('u108');
gv_vAlignTable['u108'] = 'top';
var u37 = document.getElementById('u37');
gv_vAlignTable['u37'] = 'top';
var u62 = document.getElementById('u62');

u62.style.cursor = 'pointer';
if (bIE) u62.attachEvent("onclick", Clicku62);
else u62.addEventListener("click", Clicku62, true);
function Clicku62(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u141 = document.getElementById('u141');

u141.style.cursor = 'pointer';
if (bIE) u141.attachEvent("onclick", Clicku141);
else u141.addEventListener("click", Clicku141, true);
function Clicku141(e)
{
windowEvent = e;


if (true) {

	BringToFront("u0");

	BringToFront("u146");

	BringToFront("u143");

	BringToFront("u137");

	SetPanelVisibility('u0','','none',500);

	SetPanelVisibility('u130','hidden','none',500);

	SetPanelVisibility('u101','hidden','none',500);

	SetPanelVisibility('u29','hidden','none',500);

}

}

var u11 = document.getElementById('u11');
gv_vAlignTable['u11'] = 'top';
var u75 = document.getElementById('u75');
gv_vAlignTable['u75'] = 'center';
var u133 = document.getElementById('u133');

var u34 = document.getElementById('u34');
gv_vAlignTable['u34'] = 'top';
var u68 = document.getElementById('u68');

u68.style.cursor = 'pointer';
if (bIE) u68.attachEvent("onclick", Clicku68);
else u68.addEventListener("click", Clicku68, true);
function Clicku68(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Artesanos.html" + GetQuerystring();

}

}

if (bIE) u68.attachEvent("onmouseover", MouseOveru68);
else u68.addEventListener("mouseover", MouseOveru68, true);
function MouseOveru68(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u68',e)) return;
if (true) {

	SetPanelVisibility('u79','','none',500);

	SetPanelVisibility('u82','hidden','none',500);

	SetPanelVisibility('u76','hidden','none',500);

	SetPanelVisibility('u95','hidden','none',500);

}

}

var u89 = document.getElementById('u89');

u89.style.cursor = 'pointer';
if (bIE) u89.attachEvent("onclick", Clicku89);
else u89.addEventListener("click", Clicku89, true);
function Clicku89(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspecciones.html" + GetQuerystring();

}

}

var u39 = document.getElementById('u39');
gv_vAlignTable['u39'] = 'top';
var u47 = document.getElementById('u47');
gv_vAlignTable['u47'] = 'top';
var u72 = document.getElementById('u72');

u72.style.cursor = 'pointer';
if (bIE) u72.attachEvent("onclick", Clicku72);
else u72.addEventListener("click", Clicku72, true);
function Clicku72(e)
{
windowEvent = e;


if (true) {

	self.location.href="parametros.html" + GetQuerystring();

}

}

if (bIE) u72.attachEvent("onmouseover", MouseOveru72);
else u72.addEventListener("mouseover", MouseOveru72, true);
function MouseOveru72(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u72',e)) return;
if (true) {

	SetPanelVisibility('u76','hidden','none',500);

	SetPanelVisibility('u82','hidden','none',500);

	SetPanelVisibility('u79','hidden','none',500);

	SetPanelVisibility('u95','hidden','none',500);

}

}

var u103 = document.getElementById('u103');
gv_vAlignTable['u103'] = 'center';
var u164 = document.getElementById('u164');
gv_vAlignTable['u164'] = 'top';
var u99 = document.getElementById('u99');

var u66 = document.getElementById('u66');

u66.style.cursor = 'pointer';
if (bIE) u66.attachEvent("onclick", Clicku66);
else u66.addEventListener("click", Clicku66, true);
function Clicku66(e)
{
windowEvent = e;


if (true) {

	self.location.href="modulo_Usuarios.html" + GetQuerystring();

}

}

if (bIE) u66.attachEvent("onmouseover", MouseOveru66);
else u66.addEventListener("mouseover", MouseOveru66, true);
function MouseOveru66(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u66',e)) return;
if (true) {

	SetPanelVisibility('u76','','none',500);

	SetPanelVisibility('u79','hidden','none',500);

	SetPanelVisibility('u82','hidden','none',500);

	SetPanelVisibility('u95','','none',500);

}

}

var u112 = document.getElementById('u112');
gv_vAlignTable['u112'] = 'top';
var u44 = document.getElementById('u44');
gv_vAlignTable['u44'] = 'top';
var u78 = document.getElementById('u78');
gv_vAlignTable['u78'] = 'center';
var u179 = document.getElementById('u179');

var u57 = document.getElementById('u57');
gv_vAlignTable['u57'] = 'top';
var u119 = document.getElementById('u119');
gv_vAlignTable['u119'] = 'top';
var u16 = document.getElementById('u16');
gv_vAlignTable['u16'] = 'top';
var u125 = document.getElementById('u125');
gv_vAlignTable['u125'] = 'top';
var u41 = document.getElementById('u41');
gv_vAlignTable['u41'] = 'top';
var u172 = document.getElementById('u172');
gv_vAlignTable['u172'] = 'top';
var u149 = document.getElementById('u149');

var u54 = document.getElementById('u54');
gv_vAlignTable['u54'] = 'top';
var u118 = document.getElementById('u118');
gv_vAlignTable['u118'] = 'top';
var u88 = document.getElementById('u88');
gv_vAlignTable['u88'] = 'center';
var u38 = document.getElementById('u38');
gv_vAlignTable['u38'] = 'top';
var u176 = document.getElementById('u176');
gv_vAlignTable['u176'] = 'top';
var u26 = document.getElementById('u26');
gv_vAlignTable['u26'] = 'top';
var u174 = document.getElementById('u174');
gv_vAlignTable['u174'] = 'top';
var u128 = document.getElementById('u128');
gv_vAlignTable['u128'] = 'top';
var u85 = document.getElementById('u85');

u85.style.cursor = 'pointer';
if (bIE) u85.attachEvent("onclick", Clicku85);
else u85.addEventListener("click", Clicku85, true);
function Clicku85(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_por_operador.html" + GetQuerystring();

}

}

var u51 = document.getElementById('u51');
gv_vAlignTable['u51'] = 'top';
var u10 = document.getElementById('u10');
gv_vAlignTable['u10'] = 'top';
var u100 = document.getElementById('u100');
gv_vAlignTable['u100'] = 'center';
var u23 = document.getElementById('u23');
gv_vAlignTable['u23'] = 'top';
var u144 = document.getElementById('u144');

u144.style.cursor = 'pointer';
if (bIE) u144.attachEvent("onclick", Clicku144);
else u144.addEventListener("click", Clicku144, true);
function Clicku144(e)
{
windowEvent = e;


if (true) {

	BringToFront("u101");

	BringToFront("u146");

	BringToFront("u140");

	BringToFront("u137");

	SetPanelVisibility('u101','','none',500);

	SetPanelVisibility('u130','hidden','none',500);

	SetPanelVisibility('u29','hidden','none',500);

	SetPanelVisibility('u0','hidden','none',500);

}

}

var u166 = document.getElementById('u166');
gv_vAlignTable['u166'] = 'top';
var u82 = document.getElementById('u82');

var u36 = document.getElementById('u36');
gv_vAlignTable['u36'] = 'top';
var u30 = document.getElementById('u30');

var u95 = document.getElementById('u95');

var u61 = document.getElementById('u61');
gv_vAlignTable['u61'] = 'top';
var u116 = document.getElementById('u116');
gv_vAlignTable['u116'] = 'top';
var u158 = document.getElementById('u158');
gv_vAlignTable['u158'] = 'top';
var u74 = document.getElementById('u74');

u74.style.cursor = 'pointer';
if (bIE) u74.attachEvent("onclick", Clicku74);
else u74.addEventListener("click", Clicku74, true);
function Clicku74(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

if (bIE) u74.attachEvent("onmouseover", MouseOveru74);
else u74.addEventListener("mouseover", MouseOveru74, true);
function MouseOveru74(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u74',e)) return;
if (true) {

	SetPanelVisibility('u82','','none',500);

	SetPanelVisibility('u79','hidden','none',500);

	SetPanelVisibility('u76','hidden','none',500);

	SetPanelVisibility('u95','hidden','none',500);

}

}

var u123 = document.getElementById('u123');
gv_vAlignTable['u123'] = 'top';
var u114 = document.getElementById('u114');
gv_vAlignTable['u114'] = 'top';
var u33 = document.getElementById('u33');
gv_vAlignTable['u33'] = 'center';
var u160 = document.getElementById('u160');
gv_vAlignTable['u160'] = 'top';
var u157 = document.getElementById('u157');
gv_vAlignTable['u157'] = 'top';
var u92 = document.getElementById('u92');
gv_vAlignTable['u92'] = 'center';
var u46 = document.getElementById('u46');
gv_vAlignTable['u46'] = 'top';
var u126 = document.getElementById('u126');
gv_vAlignTable['u126'] = 'top';
var u71 = document.getElementById('u71');
gv_vAlignTable['u71'] = 'center';
var u181 = document.getElementById('u181');

var u5 = document.getElementById('u5');
gv_vAlignTable['u5'] = 'top';
var u98 = document.getElementById('u98');

var u127 = document.getElementById('u127');
gv_vAlignTable['u127'] = 'top';
var u43 = document.getElementById('u43');
gv_vAlignTable['u43'] = 'top';
var u169 = document.getElementById('u169');
gv_vAlignTable['u169'] = 'top';
var u56 = document.getElementById('u56');
gv_vAlignTable['u56'] = 'top';
var u150 = document.getElementById('u150');
gv_vAlignTable['u150'] = 'center';
var u142 = document.getElementById('u142');
gv_vAlignTable['u142'] = 'center';
var u106 = document.getElementById('u106');
gv_vAlignTable['u106'] = 'top';
var u168 = document.getElementById('u168');
gv_vAlignTable['u168'] = 'top';
var u154 = document.getElementById('u154');
gv_vAlignTable['u154'] = 'top';
var u40 = document.getElementById('u40');
gv_vAlignTable['u40'] = 'top';
var u139 = document.getElementById('u139');
gv_vAlignTable['u139'] = 'center';
var u87 = document.getElementById('u87');

u87.style.cursor = 'pointer';
if (bIE) u87.attachEvent("onclick", Clicku87);
else u87.addEventListener("click", Clicku87, true);
function Clicku87(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_calificaciones_artesano.html" + GetQuerystring();

}

}

var u53 = document.getElementById('u53');
gv_vAlignTable['u53'] = 'top';
var u104 = document.getElementById('u104');

var u121 = document.getElementById('u121');
gv_vAlignTable['u121'] = 'top';
var u19 = document.getElementById('u19');
gv_vAlignTable['u19'] = 'top';
var u155 = document.getElementById('u155');
gv_vAlignTable['u155'] = 'top';
var u109 = document.getElementById('u109');
gv_vAlignTable['u109'] = 'top';
var u84 = document.getElementById('u84');
gv_vAlignTable['u84'] = 'center';
var u50 = document.getElementById('u50');
gv_vAlignTable['u50'] = 'top';
var u97 = document.getElementById('u97');
gv_vAlignTable['u97'] = 'center';
var u63 = document.getElementById('u63');
gv_vAlignTable['u63'] = 'center';
var u170 = document.getElementById('u170');
gv_vAlignTable['u170'] = 'top';
var u76 = document.getElementById('u76');

var u134 = document.getElementById('u134');
gv_vAlignTable['u134'] = 'center';
var u81 = document.getElementById('u81');
gv_vAlignTable['u81'] = 'center';
var u177 = document.getElementById('u177');
gv_vAlignTable['u177'] = 'top';
var u94 = document.getElementById('u94');
gv_vAlignTable['u94'] = 'center';
var u60 = document.getElementById('u60');
gv_vAlignTable['u60'] = 'top';
var u102 = document.getElementById('u102');

var u9 = document.getElementById('u9');
gv_vAlignTable['u9'] = 'top';
var u73 = document.getElementById('u73');
gv_vAlignTable['u73'] = 'center';
var u69 = document.getElementById('u69');
gv_vAlignTable['u69'] = 'center';
var u147 = document.getElementById('u147');

u147.style.cursor = 'pointer';
if (bIE) u147.attachEvent("onclick", Clicku147);
else u147.addEventListener("click", Clicku147, true);
function Clicku147(e)
{
windowEvent = e;


if (true) {

	BringToFront("u130");

	BringToFront("u143");

	BringToFront("u140");

	BringToFront("u137");

	SetPanelVisibility('u130','','none',500);

	SetPanelVisibility('u101','hidden','none',500);

	SetPanelVisibility('u29','hidden','none',500);

	SetPanelVisibility('u0','hidden','none',500);

}

}

var u163 = document.getElementById('u163');
gv_vAlignTable['u163'] = 'top';
var u91 = document.getElementById('u91');

u91.style.cursor = 'pointer';
if (bIE) u91.attachEvent("onclick", Clicku91);
else u91.addEventListener("click", Clicku91, true);
function Clicku91(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_inspeccion_por_estado_para_supervision.html" + GetQuerystring();

}

}

var u131 = document.getElementById('u131');

var u64 = document.getElementById('u64');

u64.style.cursor = 'pointer';
if (bIE) u64.attachEvent("onclick", Clicku64);
else u64.addEventListener("click", Clicku64, true);
function Clicku64(e)
{
windowEvent = e;


if (true) {

	self.location.href="pagina_de_inicio.html" + GetQuerystring();

}

}

var u70 = document.getElementById('u70');

u70.style.cursor = 'pointer';
if (bIE) u70.attachEvent("onclick", Clicku70);
else u70.addEventListener("click", Clicku70, true);
function Clicku70(e)
{
windowEvent = e;


if (true) {

	self.location.href="auditoria.html" + GetQuerystring();

}

}

if (bIE) u70.attachEvent("onmouseover", MouseOveru70);
else u70.addEventListener("mouseover", MouseOveru70, true);
function MouseOveru70(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u70',e)) return;
if (true) {

	SetPanelVisibility('u76','hidden','none',500);

	SetPanelVisibility('u79','hidden','none',500);

	SetPanelVisibility('u82','hidden','none',500);

	SetPanelVisibility('u95','hidden','none',500);

}

}

var u24 = document.getElementById('u24');
gv_vAlignTable['u24'] = 'top';
var u162 = document.getElementById('u162');
gv_vAlignTable['u162'] = 'top';
var u117 = document.getElementById('u117');
gv_vAlignTable['u117'] = 'top';
var u13 = document.getElementById('u13');
gv_vAlignTable['u13'] = 'top';
var u113 = document.getElementById('u113');
gv_vAlignTable['u113'] = 'top';
var u29 = document.getElementById('u29');

var u132 = document.getElementById('u132');
gv_vAlignTable['u132'] = 'center';
var u175 = document.getElementById('u175');
gv_vAlignTable['u175'] = 'top';
var u129 = document.getElementById('u129');
gv_vAlignTable['u129'] = 'top';
var u86 = document.getElementById('u86');
gv_vAlignTable['u86'] = 'center';
var u58 = document.getElementById('u58');
gv_vAlignTable['u58'] = 'top';
var u173 = document.getElementById('u173');
gv_vAlignTable['u173'] = 'top';
var u111 = document.getElementById('u111');
gv_vAlignTable['u111'] = 'top';
var u171 = document.getElementById('u171');
gv_vAlignTable['u171'] = 'top';
var u0 = document.getElementById('u0');

var u31 = document.getElementById('u31');
gv_vAlignTable['u31'] = 'center';
var u83 = document.getElementById('u83');

u83.style.cursor = 'pointer';
if (bIE) u83.attachEvent("onclick", Clicku83);
else u83.addEventListener("click", Clicku83, true);
function Clicku83(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_de_artesanos.html" + GetQuerystring();

}

}

var u178 = document.getElementById('u178');
gv_vAlignTable['u178'] = 'top';
var u8 = document.getElementById('u8');
gv_vAlignTable['u8'] = 'top';
var u3 = document.getElementById('u3');

var u96 = document.getElementById('u96');

u96.style.cursor = 'pointer';
if (bIE) u96.attachEvent("onclick", Clicku96);
else u96.addEventListener("click", Clicku96, true);
function Clicku96(e)
{
windowEvent = e;


if (true) {

	self.location.href="mis_inspecciones.html" + GetQuerystring();

}

}

var u146 = document.getElementById('u146');

var u15 = document.getElementById('u15');
gv_vAlignTable['u15'] = 'top';
var u49 = document.getElementById('u49');
gv_vAlignTable['u49'] = 'top';
var u124 = document.getElementById('u124');
gv_vAlignTable['u124'] = 'top';
var u80 = document.getElementById('u80');

u80.style.cursor = 'pointer';
if (bIE) u80.attachEvent("onclick", Clicku80);
else u80.addEventListener("click", Clicku80, true);
function Clicku80(e)
{
windowEvent = e;


if (true) {

	self.location.href="registrar_artesano.html" + GetQuerystring();

}

}

var u1 = document.getElementById('u1');

var u148 = document.getElementById('u148');
gv_vAlignTable['u148'] = 'center';
var u93 = document.getElementById('u93');

u93.style.cursor = 'pointer';
if (bIE) u93.attachEvent("onclick", Clicku93);
else u93.addEventListener("click", Clicku93, true);
function Clicku93(e)
{
windowEvent = e;


if (true) {

	self.location.href="reporte_estadistico_de_calificaciones.html" + GetQuerystring();

}

}

var u167 = document.getElementById('u167');
gv_vAlignTable['u167'] = 'top';
var u145 = document.getElementById('u145');
gv_vAlignTable['u145'] = 'center';
var u12 = document.getElementById('u12');
gv_vAlignTable['u12'] = 'top';
var u165 = document.getElementById('u165');
gv_vAlignTable['u165'] = 'top';
var u25 = document.getElementById('u25');
gv_vAlignTable['u25'] = 'top';
var u59 = document.getElementById('u59');
gv_vAlignTable['u59'] = 'top';
var u137 = document.getElementById('u137');

var u90 = document.getElementById('u90');
gv_vAlignTable['u90'] = 'center';
var u18 = document.getElementById('u18');
gv_vAlignTable['u18'] = 'top';
var u161 = document.getElementById('u161');
gv_vAlignTable['u161'] = 'top';
var u45 = document.getElementById('u45');
gv_vAlignTable['u45'] = 'top';
var u77 = document.getElementById('u77');

u77.style.cursor = 'pointer';
if (bIE) u77.attachEvent("onclick", Clicku77);
else u77.addEventListener("click", Clicku77, true);
function Clicku77(e)
{
windowEvent = e;


if (true) {

	self.location.href="agregar_usuario.html" + GetQuerystring();

}

}

var u22 = document.getElementById('u22');
gv_vAlignTable['u22'] = 'top';
var u143 = document.getElementById('u143');

var u107 = document.getElementById('u107');
gv_vAlignTable['u107'] = 'top';
var u35 = document.getElementById('u35');
gv_vAlignTable['u35'] = 'top';
var u136 = document.getElementById('u136');
gv_vAlignTable['u136'] = 'top';
var u180 = document.getElementById('u180');
gv_vAlignTable['u180'] = 'center';
var u28 = document.getElementById('u28');
gv_vAlignTable['u28'] = 'top';
if (window.OnLoad) OnLoad();
