describe('test_index', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('test index', () => {
      
      cy.visit('http://localhost/cc112/')
      cy.get('[name="bulan"]').select('Januari')
      cy.get('[name="th"]').select('2023')
      cy.get('.col-md-6 > form > .input-group > .input-group-append > .btn').click()
      cy.get('.fixed-top > form > .input-group > .form-control').type('KEBAKARAN')
      cy.get('.fixed-top > form > .input-group > .input-group-append > .btn').click()
      cy.get('#data_kej_next > .page-link').click()
      cy.get('#btn-back-to-top').click()
      cy.get('.sorting_asc').click()
      
      

    })
})