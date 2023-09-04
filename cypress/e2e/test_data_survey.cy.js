// describe('test_data_survey', () => {
//     Cypress.on('uncaught:exception', (err, runnable) => {
//       console.log(err);
//       return false;
//     })
//     it('Data', () => {
//       // Login Admin
//       cy.visit('http://localhost/cc112/')
//       cy.get('.nav-link').click()
//       cy.get('.mb-3 > .form-control').type('cc112admin')
//       cy.get(':nth-child(2) > .form-control').type('password')
//       cy.get('.btn').click()
//       cy.get(':nth-child(3) > [href="#"]').click()
//       cy.get('.menu-is-opening > .nav > :nth-child(1) > .nav-link').click()
//       cy.get('.custom-select').select('15')
//       cy.get('#survey_filter > label > .form-control').type('Pajagalan')
//     })
// })