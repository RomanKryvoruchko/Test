//$(document).ready(function(){
//
//    var patternName = "[A-ZА-Я][a-zа-я]+ [A-ZА-Я][a-zа-я]";
//    var name = $("#name");
//    var gender = $("#gender");
//    var file = $("#file");
//    name.blur(function(){
//            if(name.val().search(patternName) == 0){
//                $('#valid').text('Правильно');
//                $('#submit').attr('disabled', false);
//                name.removeClass('error').addClass('ok');
//            }else{
//                $('#valid').text('Корректно введите');
//                $('#submit').attr('disabled', true);
//                name.addClass('error');
//                name.focus();
//            }
//        });
//
//    gender.blur(function(){
//        if(gender.val() < 17){
//            $('#val').text('Возраст не должет быть меньше 17');
//            $('#submit').attr('disabled', true);
//            gender.focus();
//            gender.addClass('error');
//        }else if(gender.val()>65){
//            $('#val').text('Возраст не должет быть больше 65');
//            $('#submit').attr('disabled', true);
//            gender.focus();
//            gender.addClass('error');
//        }else{
//            $('#submit').attr('disabled', false);
//            gender.removeClass('error').addClass('ok');
//            $("#val").text('');
//        }
//    });
//
//    $(".form").submit(function(){
//        if(name.val() == ''){
//            $('#valid').text('Поле не должно быть пустым!');
//            name.addClass('error');
//            name.focus();
//            return false;
//        }else if(gender.val() == ''){
//            $('#valid').text('Поле не должно быть пустым!');
//            name.addClass('error');
//            gender.focus();
//            return false;
//        }else if(file.val() == ''){
//            $('#v').text('Вы не выбрали файл!');
//            name.addClass('error');
//            return false;
//        } else{
//            return true;
//        }
//    });
//});