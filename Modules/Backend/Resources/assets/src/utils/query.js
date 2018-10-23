
/**
 *
 */

var defaultMethod = 'GET';
var defaultHeaders = {
  'Accept': 'application/json',
  'Content-Type': 'application/json',
  // 'Content-Type': 'application/x-www-form-urlencoded',
  //'Content-Type': 'multipart/form-data'
};
var defaultBody = '';

/**
 * ajax
 */
const ajax = (url='', options) => {
  var method = options.method || defaultMethod;
  var headers = options.headers || {};
  var body = options.body || defaultBody;
  headers = Object.assign({}, defaultHeaders, headers);

  var responseIsOk = false;
  return new Promise( (resolve, reject) => {
    fetch(url, {
      method: method,
      headers: headers,
      body: body,
    }).then( response => {
      responseIsOk = response.ok;
      if(!response.ok){
        //console.log(response)
      }
      return response.json();
    }).then( data => {
      if(responseIsOk){
        resolve(data);
      }else{
        reject(data);
      }
    }).catch(error => {
      //console.log(error)
      reject(error);
    });
  });
}

const get = (url, options) => {
  options = Object.assign({}, options, {method:'GET'});
  return ajax(url, options);
}

const post = (url, options) => {
  options = Object.assign({}, options, {method:'POST'});
  return ajax(url, options);
}

export default {
  ajax: ajax,
  get: get,
  post: post,
}
