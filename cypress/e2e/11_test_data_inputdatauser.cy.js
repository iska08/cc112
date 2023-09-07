describe('test_data_inputdatauser', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('input data user', () => {
      
      cy.visit('http://localhost/cc112/')
      cy.get('.nav-link').click()
      cy.get('.mb-3 > .form-control').type('cc112admin')
      cy.get(':nth-child(2) > .form-control').type('password')
      cy.get('.btn').click()
      cy.get(':nth-child(3) > [href="#"]').click()
      cy.get('.menu-is-opening > .nav > :nth-child(1) > .nav-link').click()
      cy.get('#form_tambah_user > :nth-child(1) > .form-control').type('Polisi') //tambah username
      cy.get('#form_tambah_user > :nth-child(2) > .form-control').type('Polisi') //tambah nama
      cy.get(':nth-child(3) > .form-control').type('+62') //tambah no telp
      cy.get(':nth-child(4) > .form-control').type('polisi@gmail.com') //tambah email
      cy.get('#hak_akses').select('Tim') //pilih hak akses
      cy.get(':nth-child(2) > .form-check-input').click() //pilih checklist
      cy.get(':nth-child(7) > .btn').click()
      cy.get('.swal2-confirm').click()
      cy.get(':nth-child(1) > [width="5%"] > .btn-group > #hapus_user').click() //hapus data
      cy.get('.swal2-confirm').click()
      cy.get('.swal2-confirm').click()
      cy.get('.main-header > :nth-child(1) > :nth-child(3) > .nav-link').click()
    })
})