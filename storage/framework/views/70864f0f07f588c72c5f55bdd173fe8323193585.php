<script type="text/javascript">
  var cpfMascara = function (val) {
    return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
  }, 
      cpfOptions = {
      onKeyPress: function(val, e, field, options) {
        field.mask(cpfMascara.apply({}, arguments), options);
      }
  };
  
  $('.mascara-cpfcnpj').mask(cpfMascara, cpfOptions);
</script>

<script>
  $(document).ready(function(){
    $('.mascara-celular').mask('(99) 99999-9999');
  });

  $(document).ready(function(){
    $('.mascara-fixo').mask('(99) 9999-9999');
  });

  $(document).ready(function(){
    $('.mascara-cnpj').mask('00.000.000/0000-00');
  });

  $(document).ready(function(){
    $('.mascara-cpf').mask('000.000.000-00');
  });

  $(document).ready(function(){
    $('.mascara-cep').mask('00.000-000');
  });

  $(document).ready(function(){
    $('.mascara-data').mask('00/00/0000');
  });

  $(document).ready(function(){
    $('.mascara-estadual').mask('9999999-99');
  });
</script>

<script type="text/javascript">
  $('select[name=tipo_processo]').change(function () {
      var idtipo_processo = $(this).val();
      var public_path = window.location.href;
      $.get(public_path + '/get_licencas/' + idtipo_processo, function (licencas) {
          $('select[name=license_id]').empty();
          $.each(licencas, function (key, value) {
              $('select[name=license_id]').append('<option value=' + value.id + '>' + value.name + '</option>');
          });
      });
  });
</script>


