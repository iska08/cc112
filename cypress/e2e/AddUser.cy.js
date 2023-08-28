describe('Login', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('Add User', () => {
      // Login Admin
      cy.visit('http://localhost/cc112/')
      cy.get('.nav-link').click()
      cy.get('.mb-3 > .form-control').type('cc112admin')
      cy.get(':nth-child(2) > .form-control').type('password')
      cy.get('.btn').click()
      cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click()
      // cy.get('.nav-pills > :nth-child(2) > [href="#"]').click()
      // cy.get('.menu-is-opening > .nav > :nth-child(1) > .nav-link').click()
      // cy.get('#add_lokasi').click()
      // cy.get('#latlong').type('LatLng(-7.010412, 113.87464)')
      // cy.get(':nth-child(2) > .form-control').select('BENCANA ALAM')
      // cy.get('.main-header > :nth-child(1) > :nth-child(1) > .nav-link').click()
      // cy.get('.nav-pills > :nth-child(2) > [href="#"]').click()
      // cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click()
    })
  })