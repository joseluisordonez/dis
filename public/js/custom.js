/* Theme Name:iDea - Clean & Powerful Bootstrap Theme
 * Author:HtmlCoder
 * Author URI:http://www.htmlcoder.me
 * Author e-mail:htmlcoder.me@gmail.com
 * Version: 1.3
 * Created:October 2014
 * License URI:http://support.wrapbootstrap.com/
 * File Description: Place here your custom scripts
 */
$("#categoria").change(function(event){
	$.get(""+event.target.value+"/subcategorias",function(response,categoria){
		$("#subcategoria").empty();
		$("#subcategoria").prop('disabled', false);
		for(i=0; i<response.length;i++){
			$("#subcategoria").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
		}
	})
})