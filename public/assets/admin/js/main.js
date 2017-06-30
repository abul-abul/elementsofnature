$(document).ready(function () {
        // Gallery caegory
        window.count = 0;

        $('.add_size').click(function () {
            count++;
            content = "";
            content += "<div class='added_price_size_block' >";
                content += "<div class=col-md-10><h3>"+count+"</h3></div>"
                content += "<div class=col-md-10><input style='margin-top: 15px' type=text name='title_1_"+count+"' placeholder=Title class='form-control tt-input'>";
                content += "</div>";
                content += "<div class=col-md-2><i style='color: red;cursor: pointer;margin-left: 46px;font-size: 21px;margin-top:24px' class='glyphicon glyphicon-remove del_prize_block'></i>";
                content += "</div>";
                content += "<div class=col-md-10><textarea style='height: 36px;margin-top: 15px' name='description_1_"+count+"' placeholder=Description class='form-control tt-input'></textarea>";
                content += "</div>";
                content += "<div class=col-md-10><select style='margin-top: 15px' class='form-control input-lg frame_select' name='frame_canvas_"+count+"'><option value='frame'>Frame</option><option value='canvas'>Canvas</option></select>";
                content += "</div>";
                content += "<div class='col-md-10 fremae_added_"+count+"'><select style='margin-top: 15px' class='form-control input-lg coose_frame_block' name='frame_"+count+"'><option value='ash_"+count+"'>Ash</option><option value='noca_"+count+"'>Noca</option><option value='tobaco_"+count+"'>Tobaco</option></select>";
                content += "</div>";
                content += "<div class=col-md-5><input style='margin-top:15px' type=text name='size_"+count+"' placeholder=size class='form-control tt-input'>";
                content += "</div>";
                content += "<div class=col-md-5><input  style='margin-top:15px'type=text name='price_"+count+"' placeholder=Price class='form-control tt-input'>";
                content += "</div>";
                content += "<div class=col-md-5><input style='margin-top:15px' type=text name='alt_1_"+count+"' placeholder=Alt class='form-control tt-input'>";
                content += "</div>";
                content += "<div class=col-md-5><input style='margin-top:20px' type='file' name='images_inner_"+count+"'>";
                content += "</div><br><br><br>";

            content += "</div>";
            $('#price_size_block').append(content);
        })

        $(document).on('click','.del_prize_block',function (){
            count--;
            $(this).parent().parent().remove();
            $(this).parent().parent().next().remove();

        })

        window.html = $('.fremae_added').html();
        $(document).on('change','.frame_select',function () {
            var val = $(this).attr('value');
            if(count == 0){
                if(val == 'canvas'){
                    $(this).parent().next().children().remove();
                }else if(val == 'frame'){
                    $(this).parent().next().append(html);
                }
            }else{
                if(val == 'canvas'){
                    $(this).parent().next().children().remove();
                }else if(val == 'frame'){
                    content = "";
                    content += "<div style='padding: 0' class='col-md-12 fremae_added_"+count+"'><select style='margin-top: 15px' class='form-control input-lg coose_frame_block' name='frame_"+count+"'><option value='ash_"+count+"'>Ash</option><option value='noca_"+count+"'>Noca</option><option value='tobaco_"+count+"'>Tobaco</option></select>";
                    content += "</div>";
                    $(this).parent().next().append(content);
                }
            }
        })

        //work shopp=================================================
        $('.add_work_shop_scill').click(function () {
            count++;
            content = "";
            content += "<div>"
            content += "<div class='col-md-6'>";
                content += "<span class='twitter-typeahead'>";
                    content += "<input class='form-control tt-input' type='text' name='skill_"+count+"'>";
                content += "</span>";
            content += "</div>";
            content += "<div class='col-md-6'>";
            content += "<span class='twitter-typeahead'>";
            content += "<i style='color: red;cursor: pointer;font-size: 21px;margin-top: 7px;' class='glyphicon glyphicon-remove del_workshop_block'></i>";
            content += "</span>";
            content += "</div><br><br><br>";
            content += "</div>"

            $('.work_shopp_skills_block').append(content);
        })

        $(document).on('click','.del_workshop_block',function () {
            $(this).parent().parent().parent().remove();
        })
})