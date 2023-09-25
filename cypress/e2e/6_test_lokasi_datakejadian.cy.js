describe('test_lokasi_datakejadian', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('data kejadian', () => {
      // Login Admin
      cy.visit('http://localhost/cc112/login.php')
      cy.get('.mb-3 > .form-control').type('cc112admin')
      cy.get(':nth-child(2) > .form-control').type('password')
      cy.get('.btn').click()
      cy.get('.nav-pills > :nth-child(2) > [href="#"]').click()
      cy.get('.menu-is-opening > .nav > :nth-child(2) > .nav-link').click()
      cy.get('[name="dari_bulan"]').select('Januari')
      cy.get('[name="sampai_bulan"]').select('Desember')
      cy.get('#th').select('2021')
      cy.get('#kej').select('KEBAKARAN')
      cy.get('.btn').click()



      // cy.get('#data_kej_filter > label > .form-control').type('KEBAKARAN')
      // cy.get('.custom-select').type('10')


      cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click()//logout

    })
    
})