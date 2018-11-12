

function datetime(){
    //timepicker
    let locale = {
        en: 'en',
        zh: 'zh-cn',
    };
    moment.updateLocale(locale[g.locale],{
        week: { dow: 1 }
    });
    $(".datetimepicker").datetimepicker({
        format: 'YYYY-MM-DD'
    });
}

function avatar(){
    let $img = $('#img_avatar_preview');

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $img.attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.ipt_avatar').change(function() {
        readURL(this);
    });

    // show big image
    $img.on('click', function(e){

    })
}


export function PageCreate(){

    datetime();
    avatar();

}