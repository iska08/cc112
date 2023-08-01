describe('template spec', () => {
  Cypress.on('uncaught:exception', (err, runnable) => {
    console.log(err);
    return false;
  })
  it('masuk', () => {
    cy.visit('http://localhost/cc112/')
  })
})