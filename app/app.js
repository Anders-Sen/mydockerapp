const express = require('express')
const mysql = require('mysql2')

const app = express()

const db = mysql.createPool({
    host: 'db',
    user: 'appuser',
    password: '123Abc!!!',
    database: 'myapp'
})

app.get('/api/users', (req, res) => {

    db.query(
        'SELECT * FROM users',
        (err, results) => {

            if (err) {
                console.error(err)
                return res.status(500).send('DB Error')
            }

            res.json(results)
        }
    )
})

app.listen(3000, () => {
    console.log('App running')
})
