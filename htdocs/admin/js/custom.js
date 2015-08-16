$(function() {
    $('table').DataTable();
});

$(function() {
    $('#employeeCreate').submit(function(e) {
        var text = 'Verifique este campo';
        var error = false;
        
        var name = $('#employeeCreate input[name="name"]');
        var lastname = $('#employeeCreate input[name="lastname"]');
        var address = $('#employeeCreate input[name="address"]');
        var phone = $('#employeeCreate input[name="phone"]');
        var type = $('#employeeCreate select[name="type"]');
        
        if(!name.val())
        {
            name.parent().parent().addClass('error');
            name.next().html(text).show();
            error = true;
        }
        else
        {
            name.parent().parent().removeClass('error');
            name.next().hide();
            error = false;
        }
        
        if(!lastname.val())
        {
            lastname.parent().parent().addClass('error');
            lastname.next().html(text).show();
            error = true;
        }
        else
        {
            lastname.parent().parent().removeClass('error');
            lastname.next().hide();
            error = false;
        }
        
        if(!address.val())
        {
            address.parent().parent().addClass('error');
            address.next().html(text).show();
            error = true;
        }
        else
        {
            address.parent().parent().removeClass('error');
            address.next().hide();
            error = false;
        }
        
        if(!phone.val())
        {
            phone.parent().parent().addClass('error');
            phone.next().html(text).show();
            error = true;
        }
        else
        {
            phone.parent().parent().removeClass('error');
            phone.next().hide();
            error = false;
        }
        
        if(!type.val() || type.val() == 0)
        {
            type.parent().parent().addClass('error');
            type.next().html(text).show();
            error = true;
        }
        else
        {
            type.parent().parent().removeClass('error');
            type.next().hide();
            error = false;
        }
        
        if(error == true)
        {
            e.preventDefault();
        }
        else
        {
            return true;
        }
        
    });
});

$(function() {
    $('#providersCreate').submit(function(e) {
        var text = 'Verifique este campo';
        var error = false;
        
        var name = $('#providersCreate input[name="name"]');
        var address = $('#providersCreate input[name="address"]');
        var phone = $('#providersCreate input[name="phone"]');
        
        if(!name.val())
        {
            name.parent().parent().addClass('error');
            name.next().html(text).show();
            error = true;
        }
        else
        {
            name.parent().parent().removeClass('error');
            name.next().hide();
            error = false;
        }
        
        if(!address.val())
        {
            address.parent().parent().addClass('error');
            address.next().html(text).show();
            error = true;
        }
        else
        {
            address.parent().parent().removeClass('error');
            address.next().hide();
            error = false;
        }
        
        if(!phone.val())
        {
            phone.parent().parent().addClass('error');
            phone.next().html(text).show();
            error = true;
        }
        else
        {
            phone.parent().parent().removeClass('error');
            phone.next().hide();
            error = false;
        }
        
        if(error == true)
        {
            e.preventDefault();
        }
        else
        {
            return true;
        }
        
    });
});