$(document).ready(function () {
        // Gallery caegory
        window.count = 0;
        window.count_frame = 0;
        window.count_size = 0;

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
               // content += "<div class='col-md-10 fremae_added_"+count+"'><select style='margin-top: 15px' class='form-control input-lg coose_frame_block' name='frame_"+count+"'><option value='ash_"+count+"'>Ash</option><option value='noca_"+count+"'>Noca</option><option value='tobaco_"+count+"'>Tobaco</option></select>";
               // content += "</div>";
                //content += "<div class=col-md-5><input style='margin-top:15px' type=text name='size_"+count+"' placeholder=size class='form-control tt-input'>";
                //content += "</div>";
                // content += "<div>";
                //     content += "<input type='text' placeholder='Type Frame' class='form-control tt-input coose_frame_block' style='margin-top:15px;width:80%'>";
                //
                //     content += "<button type='button' style='margin: 14px 0 0 35px' class='btn green add_frame'>Add</button>"
                // content += "</div>";

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
                    // content = "";
                    // // content += "<div style='padding: 0' class='col-md-12 fremae_added_"+count+"'><select style='margin-top: 15px' class='form-control input-lg coose_frame_block' name='frame_"+count+"'><option value='ash_"+count+"'>Ash</option><option value='noca_"+count+"'>Noca</option><option value='tobaco_"+count+"'>Tobaco</option></select>";
                    // // content += "</div>";

                    content = "";
                    content += "<div>";
                    content += "<input placeholder='Type Frame' class='form-control tt-input coose_frame_block' style='margin-top:15px;width:80%' type='text' name='frame_"+count_frame+"'>"
                    content += "<div class='col-md-2'><i style='color: red;cursor: pointer;margin-left: 46px;font-size: 21px;margin-top:24px' class='glyphicon glyphicon-remove del_frame'></i></div>"
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

        //add frame
        $(document).on('click','.add_frame',function () {
            count_frame++;
            content = "";
            content += "<div>";
                content += "<input placeholder='Type Frame' class='form-control tt-input coose_frame_block' style='margin-top:15px;width:80%' type='text' name='frame_"+count_frame+"'>"
                content += "<div class='col-md-2'><i style='color: red;cursor: pointer;margin-left: 46px;font-size: 21px;margin-top:24px' class='glyphicon glyphicon-remove del_frame'></i></div>"
            content += "</div>";
            $('.fremae_added').append(content);

        });

        $(document).on('click','.del_frame',function () {
            count_frame --;
            $(this).parent().parent().remove();
        });


       //add size

        $('.add_size_gal_inner').click(function () {
            count_size++;
            content = "";
            content += "<div>"
            content += "<input placeholder='Size' class='form-control tt-input' style='margin-top:15px;width:50%' type='text' name='size_"+count_size+"'>";
            content += "<input placeholder='Price' class='form-control tt-input' style='margin:15px 0 0 15px;width:29%' type='text' name='price_"+count_size+"'>";
            content += "<div class='col-md-2'><i style='color: red;cursor: pointer;margin-left: 46px;font-size: 21px;margin-top:24px' class='glyphicon glyphicon-remove del_size'></i></div>"
            content += "</div>"
            $('.size_added').append(content);

        });

        $(document).on('click','.del_size',function () {
            count_size --;
            $(this).parent().parent().remove();
        })




        //change Frame
        // $('.edit_inner_frame').click(function () {
        //     var id = $(this).attr('data-id');
        //     $('.frame_modal').empty();
        //
        //     var content = "";
        //     $.ajax({
        //         url: '/index.php/admin/all-frames/'+id,
        //         type: 'get',
        //         success: function(data)
        //         {
        //             $.each(data.resource, function( index, value ) {
        //                 if (value.frame != null || value.size != null){
        //                     content += '<div class="col-md-12" style="border-bottom: 1px solid #2f343b;">';
        //                     content += '<div class="col-md-12">';
        //                     content += '<div class="col-md-12" style="margin-top: 12px;">';
        //                     content += '<b class="col-md-12">Frame</b>';
        //                     content += '<div class="col-md-10">';
        //                     content += '<input class="form-control tt-input" type="text" value="' + value.frame + '">';
        //                     content += '</div>';
        //                     content += '<div class="col-md-2">';
        //                     content += '<button data-name="frame" data-id="' + value.id + '" class="btn green edit_frame">Edit</button>';
        //                     content += '</div>';
        //                     content += '</div>';
        //                     content += '</div>';
        //
        //                     content += '<div class="col-md-12">';
        //                     content += '<div class="col-md-12" style="    margin-bottom: 12px;">';
        //                     content += '<b class="col-md-12">Size</b>';
        //                     content += '<div class="col-md-10">';
        //                     content += '<input class="form-control tt-input" type="text" value="' + value.size + '">';
        //                     content += '</div>';
        //                     content += '<div class="col-md-2">';
        //                     content += '<button data-name="size" data-id="' + value.id + '" class="btn green edit_frame">Edit</button>';
        //                     content += '</div>';
        //                     content += '</div>';
        //                     content += '</div>';
        //                     content += '</div>';
        //                 }
        //             });
        //             $('.frame_modal').append(content);
        //
        //         }
        //     });
        // });

        // $(document).on('click','.edit_frame',function () {
        //     var frame_id = $(this).attr('data-id');
        //     var frame_name = $(this).attr('data-name');
        //     var token = $('.token').attr('content');
        //     var val = $(this).parent().prev().children().val();
        //     $.ajax({
        //         url: '/index.php/admin/delete-gallery-category-images-inner',
        //         type: 'post',
        //         data: {_token:token,frame_id:frame_id,frame_name:frame_name,val:val},
        //         success: function(data)
        //         {
        //             $('#myModal1').modal('hide');
        //             $('.frame_modal').empty();
        //
        //         }
        //     });
        //
        // })

});