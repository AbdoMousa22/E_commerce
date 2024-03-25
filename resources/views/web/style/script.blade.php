<script>

 $(function(){
   $('.add_to_cart').click(function(){
    var product_id=$(this).attr("id_product");
    // console.log(product_id);
    $.ajax({
        url:"{{route('web/data_ajax')}}",
        method:"post",
        data:{product_id:product_id , _token:'{{csrf_token()}}'},
        success:function(data){
            // console.log(data);
                        $("._all_item").load(location.href+" ._all_item",function(){




$.post("{{route('web/total_price')}}",
{ _token:'{{csrf_token()}}'},
function(data){
// console.log(data);
$(".total_price").html(data);

});



$.post("{{route('web/all_count')}}",
{ _token:'{{csrf_token()}}'},
function(data){
//   console.log(data);
$("._all_count").html(data);
$("._all_count_item").html(data +" Items");

});



                                            $(".remove_cart").click(function(){
                                    var id_product=$(this).attr("remove_pro")
                                    console.log(id_product);
                                    var remove_cart=$(this).closest('.cart_i');
                                    remove_cart.remove();
                                    $.ajax({
                                        url:"{{route('web/delete_cart')}}",
                                        method: "GET",

                                        data:{id_product:id_product , _token : "{{csrf_token()}}"},
                                        success:function(data){
                                        // console.log(data);

                                        $("._all_item").load(location.href+" ._all_item",function(){


$.post("{{route('web/total_price')}}",
{ _token:'{{csrf_token()}}'},
function(data){
// console.log(data);
$(".total_price").html(data);

});



$.post("{{route('web/all_count')}}",
{ _token:'{{csrf_token()}}'},
function(data){
//   console.log(data);
$("._all_count").html(data);
$("._all_count_item").html(data +" Items");

});




                                        });





                                    },
                                    error:function(error){
                                        console.log(error);
                                    }

                                    });

                })

// $(".add_to_cart").click(function(){

// $.ajax("{{route('web/total_price')}}",
// { _token:'{{csrf_token()}}'},
// function(data){
//   console.log(data);
// // $("").html(data);

// });
// });







            })

        },
        error:function(error){
            console.log(error);
        }

    })

   })

 });

</script>


<script>


</script>




<script>
    $("._remove").click(function(){
        var id_product=$(this).attr("id_product")
        console.log(id_product);
        var remove_cart=$(this).closest('.cart_i');
        remove_cart.remove();
        $.ajax({
               url:"{{route('web/delete_cart')}}",
               method: "GET",
               data:{id_product:id_product , _token : "{{csrf_token()}}"},

            success:function(data){

            // console.log(data);
                    $.post("{{route('web/total_price')}}",
                    { _token:'{{csrf_token()}}'},
                    function(data){
                    // console.log(data);
                    $(".total_price").html(data);

                    });


                    $.post("{{route('web/all_count')}}",
                    { _token:'{{csrf_token()}}'},
                    function(data){
                    //   console.log(data);
                    $("._all_count").html(data);
                    $("._all_count_item").html(data +" Items");

});




        },
        error:function(error){
            console.log(error);
        }

        });

    })
</script>


<script>
    $("._search").keyup(function(){
        var search=$("._search").val();
        console.log(search);
        $.post("{{route('web/search')}}",
        {search:search, _token:'{{csrf_token()}}'},
        function(data){
        //   console.log(data);
        $(".data_search").html(data);

        });
    });
</script>

<script>
    $(document).ready(function(){

        $.post("{{route('web/total_price')}}",
        { _token:'{{csrf_token()}}'},
        function(data){
        //   console.log(data);
        $(".total_price").html(data);

        });
    });
</script>

<script>
    $(document).ready(function(){

        $.post("{{route('web/all_count')}}",
        { _token:'{{csrf_token()}}'},
        function(data){
        //   console.log(data);
        $("._all_count").html(data );
        $("._all_count_item").html(data +" Items");

        });
    });
</script>

