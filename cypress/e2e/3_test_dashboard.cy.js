describe('test_data_survey', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('', () => {
      
      cy.visit('http://localhost/cc112/')
      cy.get('.nav-link').click()
      cy.get('.mb-3 > .form-control').type('cc112admin')
      cy.get(':nth-child(2) > .form-control').type('password')
      cy.get('.btn').click()
    //   cy.get('.ml-auto > :nth-child(1) > .nav-link > .fas').click()
      // cy.get('.leaflet-control-fullscreen-button').click()
      cy.get('.leaflet-control-zoom-in').click()
      cy.get('.leaflet-control-zoom-out').click()
      cy.get(':nth-child(2) > div > .leaflet-control-layers-selector').click()
      cy.get('.user-panel').click()
      
    })
})