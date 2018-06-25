
/**
 * Recebe date no formato yyyy-mm-dd hh:mm:ss 
 * e retorna dd/mm/yyyy hh:mm:ss
 * 
 * @param String date
 * @returns {String}
 */function dataHoraBR(date){
    var r = date.substr(0, 10).split('-');
    return r[2]+'/'+r[1]+'/'+r[0] + ' -'+ date.substring(10, 16)+'h.';
 }
 
 /**
  * Recebe o nome de um controlador a de um método.
  * Retorna o url do site atual que executa este método.
  * 
  * @param string ctrl - nome do controlador
  * @param string func - método a ser executado
  * @param boolean use_api - decide se o acesso é via api
  * @returns {String} 
  */
 function baseURL(ctrl, func, use_api){
    var api = use_api ? 'api/' : '';	
    return 'http://'+window.location.hostname+
           '/' + api + ctrl + '/'+ func;
 }
 
 function assets(filepath){
     return 'http://'+window.location.hostname+'/assets/' + filepath;
 }
     
 function isNumeric(n) { 
    return !isNaN(parseFloat(n)) && isFinite(n); 
 }
 
 function putZero(num){
    return num < 10 ? '0'+num : num;
 }