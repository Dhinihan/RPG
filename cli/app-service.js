'use strict';

// nahApp.run(['Restangular',function(Restangular){
// Restangular.addResponseInterceptor(function(data,operation,what,url,response,deferred)
// {
// if (operation == 'getList') {
// var extractedData;
// if (data._embedded[what])
// extractedData = data._embedded[what];
// else
// extractedData = data._embedded['items'];
// extractedData.meta = {};
// extractedData.meta._links = data._links;
// extractedData.meta.collectionTotal = data.collectionTotal;
// extractedData.meta.count = data.count;
// extractedData.meta.page_count = data.page_count;
// extractedData.meta.page_size = data.page_size;
// extractedData.meta.total = data.total;
// extractedData.meta.total_items = data.total_items;
//			
// return extractedData;
//			
// }
// return data;
// });
//	
// Restangular.addFullRequestInterceptor(function(element,operation,what,url,headers,query)
// {
// /* if ((what == 'geolocalizacao') || (what == 'abransind') || (what ==
// 'parametro') )
// return {httpConfig:{cache:true}};
// return; */
// });
//			
//	
// }]);
//
// nahApp.factory('Homologacao', ['Restangular',function(Restangular) {
// return Restangular.service('homologacao');
// }]);
