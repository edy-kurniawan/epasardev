<html>
    <head>
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/sweetalert2/sweetalert2.all.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/sweetalert2/sweetalert2.css') ?>">    
</head>
    <body>
 <!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
<script>
let timerInterval
Swal.fire({
  title: 'Website ini masih dalam pengembangan!',
  html: 'Kritik dan Saran sangat membantu<p><center><b></b></center>',
  timer: 2500,
  timerProgressBar: true,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
</script>
    </body>
</html>
