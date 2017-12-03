 <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Clientes</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style type="text/css">
body{
    margin-top: 3em;
    background-image: url('http://bgmaker.ventdaval.com/get.php?id=84037');
}


    /*Panel tabs*/
.panel-tabs { 
    position: relative;
    bottom: 30px;
    clear:both;
    border-bottom: 1px solid transparent;
}
.panel-primary {
    border-color: #337ab7;
    box-shadow: 0px 0px 30px gray;
}
.panel-tabs > li {
    float: left;
    margin-bottom: -1px;
}

.panel-tabs > li > a {
    margin-right: 2px;
    margin-top: 4px;
    line-height: .85;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
    color: #ffffff;
}

.panel-tabs > li > a:hover {
    border-color: transparent;
    color: #ffffff;
    background-color: transparent;
}

.panel-tabs > li.active > a,
.panel-tabs > li.active > a:hover,
.panel-tabs > li.active > a:focus {
    color: #fff;
    cursor: default;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    background-color: rgba(255,255,255, .23);
    border-bottom-color: transparent;
}
.custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
</style>
</head>
<body>


    @yield('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>

    <script>
    /*** função para campos telefone e cpf ***/
    $(document).ready(function () {
       $("#cpf").mask("999.999.999-99");
       $('#telefone').mask("(99) 9999-9999?9");

        $('#telefone').focusout(function(){
                var phone, element;
                element = $(this);
                element.unmask();
                phone = element.val().replace(/\D/g, '');
                if(phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
        }).trigger('focusout');

      $('[data-toggle="confirmation"]').confirmation({ 
        href: function(elem){
            return $(elem).attr('href');
        },
        onConfirm: function(elem) {
        
        },
        btnOkLabel: "&nbsp;Sim", 
        btnCancelLabel: "&nbsp;Não" 
    });

      $(".btnRemove").click(function(event) {
            var result = confirm("Deseja apagar?");
            if (result) {
                return true;
            }else{
                return false;
            }
      });

    });
    </script>

</body>

</html> 