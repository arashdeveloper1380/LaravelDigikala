$("#product_cat li").hover(function ()
{
    if(this.id=='')
    {
        $('div',this).show();
    }
    else
    {
        var id=this.id.replace('li','span');
        document.getElementById(id).className='fa fa-chevron-up';
        $('ul',this).show();
    }


},function () {
    if(this.id=='')
    {
        $('div',this).hide();
    }
    else
    {
        var id=this.id.replace('li','span');
        document.getElementById(id).className='fa fa-chevron-down';
        $('ul',this).hide();
    }

});
var img_count=0;
var img=0;
load_slider=function(count)
{
    img_count=count;
    setInterval(next,5000);
};
next=function ()
{
    for(var i=0;i<img_count;i++)
    {
        var slide_img=document.getElementById('slide_img_'+i).style.display='none';
        var slider_li=document.getElementById('slider_li_'+i).className='slide_li';
        var slider_span=document.getElementById('slider_span_'+i).className='ab1';
    }
    if(img==(img_count-1))
    {
        img=-1;
    }
    img=img+1;
    document.getElementById('slide_img_'+img).style.display='block';
    document.getElementById('slider_li_'+img).className='slider_li_active';
    document.getElementById('slider_span_'+img).className='ab';


};
previous=function ()
{
    img=img-1;
    if(img==-1)
    {
        img=(img_count-1);
    }
    for(var i=0;i<img_count;i++)
    {
        var slide_img=document.getElementById('slide_img_'+i).style.display='none';
        var slider_li=document.getElementById('slider_li_'+i).className='slide_li';
        var slider_span=document.getElementById('slider_span_'+i).className='ab1';
    }

    document.getElementById('slide_img_'+img).style.display='block';
    document.getElementById('slider_li_'+img).className='slider_li_active';
    document.getElementById('slider_span_'+img).className='ab';

};


$('.slider_li li').click(function () {

    var id=this.id;
    img=parseInt(id.replace('slider_li_',''));
    for(var i=0;i<img_count;i++)
    {
        var slide_img=document.getElementById('slide_img_'+i).style.display='none';
        var slider_li=document.getElementById('slider_li_'+i).className='slide_li';
        var slider_span=document.getElementById('slider_span_'+i).className='ab1';
    }

    document.getElementById('slide_img_'+img).style.display='block';
    document.getElementById('slider_li_'+img).className='slider_li_active';
    document.getElementById('slider_span_'+img).className='ab';
});
show_amazing=function (key,count)
{
  for (var i=0;i<count;i++)
  {
      document.getElementById('amazing_div_'+i).style.display='none';
      document.getElementById('amazing_footer_'+i).style.background='#F6F7FA';
      document.getElementById('amazing_footer_'+i).style.color='#000';
  }
  document.getElementById('amazing_div_'+key).style.display='block';
  document.getElementById('amazing_footer_'+key).style.background='#FF5252';
    document.getElementById('amazing_footer_'+key).style.color='#FFF';
};
show_review=function (key) {
    var c=document.getElementById('review_div_'+key).style.display;
    if(c=='none')
    {
        document.getElementById('review_title_'+key).className='review_title';
        $("#review_div_"+key).slideDown();
    }
    else
    {
        document.getElementById('review_title_'+key).className='review_title2';
        $("#review_div_"+key).slideUp();
    }
};
show_service=function ()
{
    var c=document.getElementById('service_box').style.display;
    if(c=='block')
    {
        document.getElementById('service_ic').className='service_ic';
        $("#service_box").slideUp();
    }
    else
    {
        document.getElementById('service_ic').className='service_ic2';
        $("#service_box").slideDown();
    }
};
function del_row(id,url,token)
{

    var route=url+"/";
    if (!confirm("آیا از حذف این آدرس اطمینان دارید !"))
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
set_pay=function (id)
{

    $("#tab_payment_1").removeClass('pay_type_table');
    $("#tab_payment_5").removeClass('pay_type_table');
    $("#tab_payment_6").removeClass('pay_type_table');
    $("#tab_payment_7").removeClass('pay_type_table');

    for (var i = 1; i < 8; i++)
    {
        var a=document.getElementById('pay_radio_' + i);
        if(a)
        {
            a.className = 'radio-control'
        }
    }
    if (id == 1)
    {
        document.getElementById('pay_radio_1').className = 'radio-control2';
        document.getElementById('pay_radio_3').className = 'radio-control2';
        document.getElementById('post_radio_3').setAttribute('checked','checked');
        $("#tab_payment_1").addClass('pay_type_table');
    }
    else if ((id == 2) || (id==3) || (id==4))
    {
        alert(id);
        document.getElementById('pay_radio_1').className = 'radio-control2';
        document.getElementById('pay_radio_'+id).className = 'radio-control2';
        document.getElementById('post_radio_'+id).setAttribute('checked','checked');
        $("#tab_payment_1").addClass('pay_type_table');
    }
    else
    {
        document.getElementById('pay_radio_'+id).className = 'radio-control2';
        document.getElementById('post_radio_'+id).setAttribute('checked','checked');
        $("#tab_payment_"+id).addClass('pay_type_table');
    }

};
