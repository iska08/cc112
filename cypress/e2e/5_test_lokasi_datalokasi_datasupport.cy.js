describe('test_lokasi_datalokasi_datasupport', () => {
    Cypress.on('uncaught:exception', (err, runnable) => {
      console.log(err);
      return false;
    })
    it('data support', () => {
        cy.visit('http://localhost/cc112/login.php')
        cy.get('.mb-3 > .form-control').type('cc112admin')
        cy.get(':nth-child(2) > .form-control').type('password')
        cy.get('.btn').click()
        cy.get('.nav-pills > :nth-child(2) > [href="#"]').click()
        cy.get('.menu-is-opening > .nav > :nth-child(3) > .nav-link').click()
        cy.get('#add_support').click()//tambah data support
        
        //cari data
        cy.get('#id_lokasi').select('28 Juli 2023 07:00 - KEBAKARAN')
        cy.get('#form_pencarian > .btn').click()

        //tambah data
        cy.get('#opd_terkait').select('SATPOL PP')
        cy.get('#jumlah_tim').type('6')
        cy.get('#form_tambah_support > :nth-child(4) > .form-control').type('Pengamanan Lalu Lintas')
        cy.get(':nth-child(5) > .btn-info').click()

        cy.get('.swal2-confirm').click()
        cy.get('.nav-pills > :nth-child(4) > .nav-link').click()
    })

})