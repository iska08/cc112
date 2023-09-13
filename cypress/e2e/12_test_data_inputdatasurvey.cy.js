describe('test_data_inputdatasurvey', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('input data survey', () => {
      
      cy.visit('http://localhost/cc112/')
      cy.get('.nav-link').click()
      cy.get('.mb-3 > .form-control').type('cc112admin')
      cy.get(':nth-child(2) > .form-control').type('password')
      cy.get('.btn').click()
      cy.get(':nth-child(3) > [href="#"]').click()
      cy.get('.menu-is-opening > .nav > :nth-child(1) > .nav-link').click()
      cy.get('#form_tambah_survey > :nth-child(1) > .form-control').type('sumayyah') //tambah nama
      cy.get('#form_tambah_survey > :nth-child(2) > .form-control').type('jalan raya sumenep') //tambah alamat
      cy.get('#form_tambah_survey > :nth-child(3) > .form-control').type('08787878') //tambah no telp
      cy.get('input[name="res1"]').invoke('val', 90).trigger('input')//tambah skala
      cy.get('input[name="res2"]').invoke('val', 100).trigger('input')//tambah skala
      cy.get(':nth-child(6) > .form-control').type('melayani dengan cepat dan tanggap dalam hal masalah kedaruratan')//tambah kritik
      cy.get('#form_tambah_survey > :nth-child(7) > .btn').click()
      cy.get('.swal2-confirm').click()
      cy.get('#survey_filter > label > .form-control').type('sumayyah')//search nama
      cy.get(':nth-child(1) > [width="5%"] > .btn-group > #hapus_survey').click()
      cy.get('.swal2-confirm').click()
      cy.get('.swal2-confirm').click()
      cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click()//logout




    })
})