</main>
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
<script src="../js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
<script src="../js/buscador.js"></script>
<script>
  $('.button-collpase').sideNav();
  $('select').material_select();
  $('.datepicker').pickadate({
    format: 'yyyy-m-d',
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });


function may(obj, id){
  obj = obj.toUpperCase();
  document.getElementById(id).value = obj;
}
</script>
