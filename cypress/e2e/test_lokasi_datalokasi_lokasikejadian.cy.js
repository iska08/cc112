describe('test_lokasi_datalokasi_inputlokasi', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('data lokasi kejadian', () => {
        cy.visit('http://localhost/cc112/')
        cy.get('.nav-link').click()
        cy.get('.mb-3 > .form-control').type('cc112admin')
        cy.get(':nth-child(2) > .form-control').type('password')
        cy.get('.btn').click()
        cy.get('.nav-pills > :nth-child(2) > [href="#"]').click()
        cy.get('.menu-is-opening > .nav > :nth-child(1) > .nav-link').click()
        cy.get('.custom-select').select('20')
        cy.get('#tower_filter > label > .form-control').type('BENCANA ALAM')
        cy.get(':nth-child(11) > .btn-info').click()
        cy.get('#tower_next > .page-link').click()

    })
})