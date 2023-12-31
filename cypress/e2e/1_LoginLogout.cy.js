describe('Login', () => {
  Cypress.on('uncaught:exception', (err, runnable) => {
    console.log(err);
    return false;
  })
  it('Login Admin', () => {
    cy.visit('http://localhost/cc112/login.php')
    cy.get('.mb-3 > .form-control').type('cc112admin')
    cy.get(':nth-child(2) > .form-control').type('password')
    cy.get('.btn').click()
    cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click()
  })
  it('Login Tim', () => {
    cy.visit('http://localhost/cc112/login.php')
    cy.get('.mb-3 > .form-control').type('damkar_CC112')
    cy.get(':nth-child(2) > .form-control').type('password')
    cy.get('.btn').click()
    cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click()
  })
  it('Login Tim', () => {
    cy.visit('http://localhost/cc112/login.php')
    cy.get('.mb-3 > .form-control').type('1CallCenter112')
    cy.get(':nth-child(2) > .form-control').type('password')
    cy.get('.btn').click()
    cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click()
  })

})