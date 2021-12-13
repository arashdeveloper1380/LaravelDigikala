function del_row(id,url,token)
{

    var route=url+"/";
    if (!confirm("آیا از حذف این رکورد اطمینان دارید !"))
        return false;

    var form = document.createElement("form");
    form.setAttribute("method", "POST");
    form.setAttribute("action",route+id);
    var hiddenField1 = document.createElement("input");
    hiddenField1.setAttribute("name", "_method");
    hiddenField1.setAttribute("value",'DELETE');
    form.appendChild(hiddenField1);
    var hiddenField2 = document.createElement("input");
    hiddenField2.setAttribute("name", "_token");
    hiddenField2.setAttribute("value",token);
    form.appendChild(hiddenField2);
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}
function del_img(id,url,token)
{

    var route=url+"/";
    if (!confirm("آیا از حذف این تصویر مطمین هستین ؟"))
        return false;

    var form = document.createElement("form");
    form.setAttribute("method", "POST");
    form.setAttribute("action",route+id);
    var hiddenField2 = document.createElement("input");
    hiddenField2.setAttribute("name", "_token");
    hiddenField2.setAttribute("value",token);
    form.appendChild(hiddenField2);
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}
add_filter=function ()
{

    var count=document.getElementsByClassName('product_filter_div').length+1;
    var id1="'"+'filter_div-'+count+"'";
    var id2='-'+count;
    var id3="'child_filter-'";
    var html='<div id="filter_div-'+count+'" style="width:100%;float:right;margin-top:10px;margin-bottom:5px" class="product_filter_div">' +
        '<input type="text" name="filter_name[-'+count+']" class="form-control" style="float: right;" placeholder="نام فیلتر ...">' +
        '<input type="text" name="filter_ename[-'+count+']" class="form-control" style="float: right;" placeholder="نام لاتین فیلتر ...">' +
        '<select id="filter_filed-'+count+'" name="filter_filed[-'+count+']" class="form-control" style="float:right;margin-right:10px">' +
        '<option value="1">فیلد radio</option>' +
        '<option value="2">فیلد color</option></select></div>' +
        '<div class="form-group" style="margin-right:0px;margin-bottom:0px;">' +
        '<span class="fa fa-plus" style="color:red;cursor:pointer;padding-top:15px" onclick="add_child_filter('+id1+','+id2+','+id3+')"></span>' +
        '</div>';

    $("#filter_box").append(html);
};
add_child_filter=function (id1,id2,id3)
{
    var filed_id=id1.replace('div','filed');
   var filed=document.getElementById(filed_id).value;
   var count=document.getElementsByClassName('child_filter').length+1;
   var div_id=id3+count;
   if(document.getElementById(div_id))
   {
       div_id=div_id.replace('filter_','filter-');
   }
   var div1='<div class="child_filter" id="'+div_id+'"></div>';
   if(filed==1)
   {
       var input1='<input type="text" class="color_input_name" name="filter_child['+id2+'][-'+count+']"/>'
       $("#"+id1).append(div1);
       $("#"+div_id).append(input1);
   }
   else
   {

       var input1='<input type="text" class="color_input_name" name="filter_child['+id2+'][-'+count+']"/>'

       var input2=document.createElement('input');
       input2.name='filter_color['+id2+'][-'+count+']';
       input2.className='color_input_code';
       var color=new jscolor(input2);
       $("#"+id1).append(div1);
       $("#"+div_id).append(input1);
       $("#"+div_id).append(input2);
   }

};
add_item=function ()
{
    var count=document.getElementsByClassName('product_item_div').length+1;
    var id1="'"+'item_div-'+count+"'";
    var id2='-'+count;
    var html='<div id="item_div-'+count+'" style="width:100%;float:right;margin-top:10px;margin-bottom:5px" class="product_item_div">' +
        '<input name="item_name[-'+count+']" type="text"  style="float: right;" class="form-control" placeholder="نام گروه" >' +
        '</div>'+
        '<div class="form-group" style="margin-right:0px;margin-bottom:0px;">' +
        '<span class="fa fa-plus" style="color:red;cursor:pointer;padding-top:15px" onclick="add_child_item('+id1+','+id2+')"></span>' +
        '</div>';
    ;
    $("#item_box").append(html);
};
add_child_item=function(id1,id2)
{
    var count=document.getElementsByClassName('child_item').length+1;
    var html='<div class="child_item">' +
        '<input type="text" name="child_item['+id2+'][-'+count+']" style="float: right;" class="form-control" placeholder="نام آیتم">' +
        '<select name="child_filed['+id2+'][-'+count+']" class="form-control" style="float:right;margin-right:10px">' +
        '<option value="1">فیلد input</option>' +
        '<option value="2">فیلد select</option>' +
        '<option value="3">فیلد textarea</option>' +
        '</select>' +
        '</div>';
    $("#"+id1).append(html);
};
$("#menu li").click(function () {

    $("#menu li ul").hide();
    $("#menu li a").removeClass('menu_li_back');
    $("#"+this.id+" a").addClass('menu_li_back');
    $("#"+this.id+" ul").show();
    sessionStorage.setItem('menu_id',this.id);
});
show_menu();
function show_menu()
{
   var id=sessionStorage.getItem('menu_id');
   if(id)
   {
       $("#menu li ul").hide();
       $("#menu li a").removeClass('menu_li_back');
       $("#"+id+" a").addClass('menu_li_back');
       $("#"+id+" ul").show();
   }
}