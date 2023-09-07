describe('test_data_inputdataOPD', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('input data jenis kejadian', () => {
      
      cy.visit('http://localhost/cc112/')
      cy.get('.nav-link').click()
      cy.get('.mb-3 > .form-control').type('cc112admin')
      cy.get(':nth-child(2) > .form-control').type('password')
      cy.get('.btn').click()
      cy.get(':nth-child(3) > [href="#"]').click()
      cy.get('.menu-is-opening > .nav > :nth-child(1) > .nav-link').click()
      cy.get('#form_tambah_kej > :nth-child(1) > .form-control').select('Polisi') //pilih opd
      cy.get('#form_tambah_kej > :nth-child(2) > .form-control').type('maling') //tambah jenis kejadian
      cy.get('#form_tambah_kej > :nth-child(3) > .btn').click()
      cy.get('.swal2-confirm').click()
      cy.get('#kej_filter > label > .form-control').type('maling') //search jenis kejadian
      cy.get(':nth-child(1) > [width="5%"] > .btn-group > #hapus_kej').click() //hapus jenis kejadian
      cy.get('.swal2-confirm').click()
      cy.get('.swal2-confirm').click()
      cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click() //logout

    })
})