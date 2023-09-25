describe('test_lokasi_datalokasi_inputlokasi', () => {
  Cypress.on('uncaught:exception', (err, runnable) => {
    console.log(err);
    return false;
  })
  it('Input Lokasi', () => {
    // Login Admin
    cy.visit('http://localhost/cc112/login.php')
    cy.get('.mb-3 > .form-control').type('cc112admin')
    cy.get(':nth-child(2) > .form-control').type('password')
    cy.get('.btn').click()
    cy.get('.nav-pills > :nth-child(2) > [href="#"]').click()
    cy.get('.menu-is-opening > .nav > :nth-child(1) > .nav-link').click()
    cy.get('#add_lokasi').click()
    cy.get('#latlong').type('LatLng(-7.010412, 113.87464)')
    cy.get(':nth-child(2) > .form-control').select('KEBAKARAN')
    cy.get('#kecamatan').select('Kalianget')
    cy.get('#desa').select('Kalimook')
    cy.get('#nama_pelapor').type('tono')
    cy.get('#noTelp_pelapor').type('081216305051')
    cy.get('#tanggal_terima').click()//tanggal terima
    cy.get('.open > .flatpickr-innerContainer > .flatpickr-rContainer > .flatpickr-days > .dayContainer > .today').click()
    cy.get('.col-md-9').click()
    cy.get('#tanggal_selesai').click() //tanggal selesai
    cy.get('.open > .flatpickr-innerContainer > .flatpickr-rContainer > .flatpickr-days > .dayContainer > .today').click()
    cy.get('.col-md-9').click()
    cy.get(':nth-child(9) > .form-control').type('jalan raya kalianget sumenep')
    cy.get(':nth-child(10) > .form-control').type('terjadi bencana banjir dipemukiman warga ')
    cy.get('.btn-info').click()
    cy.get('.swal2-confirm').click()
    cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click() //logout
  })
  it('data lokasi kejadian', () => {
    cy.visit('http://localhost/cc112/login.php')
    cy.get('.mb-3 > .form-control').type('cc112admin')
    cy.get(':nth-child(2) > .form-control').type('password')
    cy.get('.btn').click()
    cy.get('.nav-pills > :nth-child(2) > [href="#"]').click()
    cy.get('.menu-is-opening > .nav > :nth-child(1) > .nav-link').click()
    cy.get(':nth-child(1) > [width="5%"] > .btn-group > #edit_lokasi').click() //edit data
    cy.get(':nth-child(10) > .form-control').clear().type('3')
    cy.get('.btn-info').click()
    cy.get('.swal2-confirm').click()
    cy.get(':nth-child(1) > [width="20%"] > #upload_foto > [type="file"]').selectFile('cypress/fixtures/10039948.jpeg') //input gambar
    cy.get(':nth-child(1) > [width="20%"] > #upload_foto > #inputGroupFileAddon04').click()
    cy.get('.swal2-confirm').click()
    // cy.get(':nth-child(1) > :nth-child(11) > .btn-info').click() //fitur approve
    

    // cy.get(':nth-child(1) > [width="20%"] > .row > .col > :nth-child(1) > #hapus_foto').click()  //hapus foto
    // cy.get('.swal2-confirm').click()
    // cy.get('.swal2-confirm').click()
    // cy.get(':nth-child(1) > [width="5%"] > .btn-group > #hapus_lokasi').click() //hapus data lokasi
    // cy.get('.swal2-confirm').click()
    // cy.get('.swal2-confirm').click()
    // cy.get(':nth-child(1) > :nth-child(11) > .btn-info').click()
    // cy.get('#tower_next > .page-link').click() 
    cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click() //logout
  })
  it('data kejadian', () => {
    // Login Admin
    cy.visit('http://localhost/cc112/login.php')
    cy.get('.mb-3 > .form-control').type('cc112admin')
    cy.get(':nth-child(2) > .form-control').type('password')
    cy.get('.btn').click()
    cy.get('.nav-pills > :nth-child(2) > [href="#"]').click()
    cy.get('.menu-is-opening > .nav > :nth-child(2) > .nav-link').click()
    cy.get('[name="dari_bulan"]').select('Januari')
    cy.get('[name="sampai_bulan"]').select('Desember')
    cy.get('#th').select('2021')
    cy.get('#kej').select('KEBAKARAN')
    cy.get('.btn').click()
    // cy.get('#data_kej_filter > label > .form-control').type('KEBAKARAN')
    // cy.get('.custom-select').type('10')
    cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click()//logout
  })

})