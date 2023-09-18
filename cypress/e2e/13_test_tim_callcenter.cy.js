describe('test_tim_callcenter', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('tim call center', () => {
      cy.visit('http://localhost/cc112/')
      cy.get('.nav-link').click()
      cy.get('.mb-3 > .form-control').type('1CallCenter112')
      cy.get(':nth-child(2) > .form-control').type('password')
      cy.get('.btn').click()
      cy.get('#add_lokasi').click()
      cy.get('#latlong').type('LatLng(-7.010412, 113.87464)')
      cy.get(':nth-child(2) > .form-control').select('BENCANA ALAM')
      cy.get('#kecamatan').select('Kalianget')
      cy.get('#desa').select('Kalimook')
      cy.get('#nama_pelapor').type('toni')
      cy.get('#noTelp_pelapor').type('0812163050')
      cy.get('#tanggal_terima').click()//tanggal terima
      cy.get('.open > .flatpickr-innerContainer > .flatpickr-rContainer > .flatpickr-days > .dayContainer > .today').click()
      cy.get('.col-md-9').click()
      cy.get(':nth-child(8) > .form-control').type('jalan raya kalianget sumenep')
      cy.get(':nth-child(9) > .form-control').type('terjadi bencana banjir dipemukiman warga ')
      cy.get('.btn-info').click()
      cy.get('.swal2-confirm').click()
      cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click() //logout
    })
    it('tim bpbd ', () => {
      cy.visit('http://localhost/cc112/')
      cy.get('.nav-link').click()
      cy.get('.mb-3 > .form-control').type('bpbd_CC112')
      cy.get(':nth-child(2) > .form-control').type('password')
      cy.get('.btn').click()
      cy.get(':nth-child(1) > [width="20%"] > #upload_foto > [type="file"]').selectFile('cypress/fixtures/10039948.jpeg') //input gambar
      cy.get(':nth-child(1) > [width="20%"] > #upload_foto > #inputGroupFileAddon04').click()
      cy.get('.swal2-confirm').click()
      cy.get(':nth-child(1) > [width="5%"] > .btn-group > #edit_lokasi').click()
      cy.get('#tanggal_selesai').click() //tanggal selesai
      cy.get('.today').click()
      cy.get('.leaflet-control-zoom-in').click()
      cy.get(':nth-child(2) > .form-control').type('banjir terjadi di perumahan') //laporan
      cy.get('.btn-info').click()
      cy.get('.swal2-confirm').click()
    })
  })