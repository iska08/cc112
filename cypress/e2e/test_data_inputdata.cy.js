describe('test_data_survey', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('Data', () => {
      // Login Admin
      cy.visit('http://localhost/cc112/')
      cy.get('.nav-link').click()
      cy.get('.mb-3 > .form-control').type('cc112admin')
      cy.get(':nth-child(2) > .form-control').type('password')
      cy.get('.btn').click()
      cy.get(':nth-child(3) > [href="#"]').click()
      cy.get('.menu-is-opening > .nav > :nth-child(2) > .nav-link').click()
      cy.get('#form_tambah_kec > :nth-child(1) > .form-control').type('Raas')
      cy.get('#form_tambah_kec > :nth-child(2) > .btn').click()
      cy.get('.swal2-confirm').click()
      cy.get('#kec_filter > label > .form-control').type('Raas')
      // cy.get(':nth-child(1) > [width="5%"] > .btn-group > #edit_kec').click()
      // cy.get('#form_edit_kec > :nth-child(1) > .form-control').type('')
    })
})