$(document).ready(function () {
        window.count = 0;

        $('.add_size').click(function () {
            count++;
            content = "";
            content += "<div class='added_price_size_block1' >";
            content += "<div class=col-md-4><input type=text name='size_"+count+"' placeholder=size class='form-control tt-input'>";
            content += "</div>";
            content += "<div class=col-md-4><input type=text name='price_"+count+"' placeholder=Price class='form-control tt-input'>";
            content += "</div>";
            content += "<div class=col-md-4><i style='color: red;cursor: pointer' class='glyphicon glyphicon-remove del_prize_block'></i>";
            content += "</div><br><br><br>";
            content += "</div>";

            $('#price_size_block').append(content);
        })

        $(document).on('click','.del_prize_block',function (){
            $(this).parent().parent().remove();
            $(this).parent().parent().next().remove();

        })

        window.html = $('.fremae_added').html();

        $('.frame_select').change(function () {
             var val = $(this).attr('value');
             if(val == 'canvas'){
                $('.coose_frame_block').remove();
             }else if(val == 'frame'){
                 $('.fremae_added').append(html);
             }
        })

  //
})