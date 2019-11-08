$(document).ready(function () {
    var load = $('.load1')
    var name = $('#title1').html()
    var list_array = []
    todo_array = []
    i = 0

    $.ajax({
        type: 'json',
        method: "GET",
        cache: false,
        data: {
            'name': name
        },
        url: '/todos/show',
        success: function (response) {
            var res = response.todo
            res = res.split(',')
            list_array.push(res)
            console.log(list_array)
            load.hide()
            for (var j = 0; j < list_array.lenght; j++) {
                $(".lists").append("<div class='input-group' id='group" + j + "'><input class='form-control' type='text' id='todo_list[" + j + "]' name='todo_list[" + j + "]'><div class='input-group-btn'><button class='btn btn-outline-secondary' type='button' id='button-addon2-" + j + "' onclick='delTodo(" + j + ")'>X</button></div></div>");
                $("input[name='todo_list[" + j + "]']").val(list_array[j]);
            }
            todo_array = [list_array];
            i = list_array.lenght;
        }
    })


    $('#addTodo').on('submit', function (e) {
        e.preventDefault();
        $(".lists").append("<div class='input-group' id='group" + i + "'><input class='form-control' type='text' id='todo_list[" + i + "]' name='todo_list[" + i + "]'><div class='input-group-btn'><button class='btn btn-outline-secondary' type='button' id='button-addon2-" + i + "' onclick='delTodo(" + i + ")'>X</button></div></div>");
        $("input[name='todo_list[" + i + "]']").val($('#list').val());
        todo_array.push($('#list').val());
        console.log($('#list').val())
        i += 1;
        $('#list').val('');
    });

    delTodo = id => {
        $("#group" + id + "").remove();
        todo_array.splice(id, 1);
    }

    $("#save").on('submit', function (e) {
        e.preventDefault();
        $('.load').show();
        var name = $('input[name="name"]').val();
        var todo_string = todo_array.toString();
        $(".coba").html(todo_string);
        $.ajax({
            type: 'json',
            method: "GET",
            cache: false,
            data: {
                'name': name,
                'todo': todo_string
            },
            url: '/todos/add',
            success: function () {
                $('.result').delay(1000).fadeIn('slow')
                $('.result').delay(1000).fadeOut('slow')
                $('.load').hide()
            }
        });
    });
});
