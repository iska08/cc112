describe('test_lokasi_datalokasi_inputlokasi', () => {
  Cypress.on('uncaught:exception', (err, runnable) => {
    console.log(err);
    return false;
  })
  it('Input Lokasi', () => {
    // Login Admin
    cy.visit('http://localhost/cc112/')
    cy.get('.nav-link').click()
    cy.get('.mb-3 > .form-control').type('cc112admin')
    cy.get(':nth-child(2) > .form-control').type('password')
    cy.get('.btn').click()
    cy.get('.nav-pills > :nth-child(2) > [href="#"]').click()
    cy.get('.menu-is-opening > .nav > :nth-child(1) > .nav-link').click()
    cy.get('#add_lokasi').click()
    cy.get('#latlong').type('LatLng(-7.010412, 113.87464)')
    cy.get(':nth-child(2) > .form-control').select('BENCANA ALAM')
    cy.get('#kecamatan').select('Kalianget')
    cy.get('#desa').select('Kalimook')
    cy.get('#nama_pelapor').type('tono')
    cy.get('#noTelp_pelapor').type('08121')
    cy.get('#tanggal_terima').click()//tanggal terima
    cy.get('.open > .flatpickr-innerContainer > .flatpickr-rContainer > .flatpickr-days > .dayContainer > .today').click()
    cy.get('.col-md-9').click()
    cy.get('#tanggal_selesai').click() //tanggal selesai
    cy.get('.open > .flatpickr-innerContainer > .flatpickr-rContainer > .flatpickr-days > .dayContainer > .today').click()
    cy.get('.col-md-9').click()
    cy.get(':nth-child(9) > .form-control').type('jalan raya kalianget sumenep')
    cy.get(':nth-child(10) > .form-control').type('terjadi bencana banjir dipemukiman warga ')
    cy.get(':nth-child(11) > .form-control').selectFile('cypress/fixtures/10039948.jpeg')
    cy.get('.btn-info').click()
    cy.get('.swal2-confirm').click()
    // cy.get('#tanggal_terima').click()//tanggal terima
    // cy.get('.open > .flatpickr-innerContainer > .flatpickr-rContainer > .flatpickr-days > .dayContainer > .today').click()
    // cy.get('.col-md-9').click()
    // cy.get('#tanggal_selesai').click() //tanggal selesai
    // cy.get('.open > .flatpickr-innerContainer > .flatpickr-rContainer > .flatpickr-days > .dayContainer > .today').click()
    // cy.get('.col-md-9').click()

    // cy.get('.main-header > :nth-child(1) > :nth-child(1) > .nav-link').click()
    // cy.get('.nav-pills > :nth-child(2) > [href="#"]').click()
    // cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click()
  })
})