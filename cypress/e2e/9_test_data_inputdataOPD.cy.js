describe('test_data_inputdataOPD', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('input data OPD', () => {
      
      cy.visit('http://localhost/cc112/')
      cy.get('.nav-link').click()
      cy.get('.mb-3 > .form-control').type('cc112admin')
      cy.get(':nth-child(2) > .form-control').type('password')
      cy.get('.btn').click()
      cy.get(':nth-child(3) > [href="#"]').click()
      cy.get('.menu-is-opening > .nav > :nth-child(1) > .nav-link').click()
      cy.get('#form_tambah_opd > :nth-child(1) > .form-control').type('POLISI')
      cy.get('#form_tambah_opd > :nth-child(2) > .btn').click()
      cy.get('.swal2-confirm').click()
      cy.get('#opd_filter > label > .form-control').type('POLISI') //search opd
      cy.get(':nth-child(1) > [width="5%"] > .btn-group > #hapus_opd').click()
      cy.get('.swal2-confirm').click()
    })
})