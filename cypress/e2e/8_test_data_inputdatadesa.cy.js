describe('test_data_inputdatadesa', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('input data desa', () => {
      
      cy.visit('http://localhost/cc112/')
      cy.get('.nav-link').click()
      cy.get('.mb-3 > .form-control').type('cc112admin')
      cy.get(':nth-child(2) > .form-control').type('password')
      cy.get('.btn').click()
      cy.get(':nth-child(3) > [href="#"]').click()
      cy.get('.menu-is-opening > .nav > :nth-child(1) > .nav-link').click()
      cy.get('#form_tambah_desa > :nth-child(1) > .form-control').select('Kalianget')
      cy.get('#form_tambah_desa > :nth-child(2) > .form-control').type('Kalianget tengah')
      cy.get('#form_tambah_desa > :nth-child(3) > .btn').click()
      cy.get('.swal2-confirm').click()
      cy.get('#desa_filter > label > .form-control').type('kalianget tengah') //search desa
      cy.get(':nth-child(1) > [width="5%"] > .btn-group > #hapus_desa').click() //hapus desa
      cy.get('.swal2-confirm').click()
      cy.get('.swal2-confirm').click()

    })
})