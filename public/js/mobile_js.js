var img_count=0;
var img=0;
var show_img_product=0;
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
    }
    if(img==(img_count-1))
    {
        img=-1;
    }
    img=img+1;
    document.getElementById('slide_img_'+img).style.display='block';
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
    }

    document.getElementById('slide_img_'+img).style.display='block';

};

$(document).ready(function () {
    $("#slider_box").swipe( {
        swipe:function(event, direction, distance, duration, fingerCount, fingerData)
        {
            if(direction=='right')
            {
                previous();
            }
            else if(direction=='left')
            {
                next();
            }
        },
        threshold:0
    });
});

hide_cat_box=function ()
{
    var n=100;
    var w=document.getElementById('cat_box');

    var a=setInterval(function () {
        if(n>0)
        {
            n=n-5;
        }
        var width=n+'%';
        if(n==90)
        {
            $("#back_cat_list").hide();
        }
        if(n==0)
        {
            $("#cat_box").hide();
            clearInterval(a);
        }
        else
        {
            w.style.width=width;
        }

    },10);
    document.body.style.overflow='auto';
};

show_cat_box=function ()
{

    var n=0;
    $("#cat_box").show();

    var w=document.getElementById('cat_box');
    var b=setInterval(function () {
        if(n<100)
        {
            n=n+5;
        }
        if(n==95)
        {
            $("#back_cat_list").show();
        }
        if(n==100)
        {
            clearInterval(b);
        }
        var width=n+'%';

        w.style.width=width;

    },10);
    document.body.style.overflow='hidden';
};

show_child_cat=function (id)
{
    var c=document.getElementById('child_ul_'+id);
    if(c)
    {
        if(c.style.display=='block')
        {
            $("#span_ic_"+id).addClass('fa-angle-down');
            $("#span_ic_"+id).removeClass('fa-angle-up');
            $("#child_ul_"+id).slideUp();

        }
        else
        {
            $("#span_ic_"+id).addClass('fa-angle-up');
            $("#span_ic_"+id).removeClass('fa-angle-down');
            $("#child_ul_"+id).slideDown();
        }

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

submit_cart_form=function ()
{
    $("#add_cart_form").submit();
};
show_filter_box=function ()
{
  $('.filter_box').show();
   document.body.style.overflow='hidden';
};
close_filter_box=function ()
{
    $('.filter_box').hide();
    document.body.style.overflow='auto';
};
show_child_filter=function (id)
{
    $('.child_filter_div').hide();
    $("#filter_div_"+id).show();
};