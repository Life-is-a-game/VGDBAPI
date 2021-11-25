<!DOCTYPE html>
<html>
    <head>
        <style>
            table{
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            td, th{
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            tr:nth-child(even){
                background-color: #ddd;
            }
        </style>
    </head>
    <body>
        <h2>Video Game Database API Documentation</h2>
        <table>
            <tr>
                <th>Route</th>
                <th>Server Method</th>
                <th>Type</th>
                <th>Posted JSON Example</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>/games</td>
                <td>GET</td>
                <td>JSON</td>
                <td><code>N/A</code></td>
                <td>Returns all games that are stored in the database</td>
            </tr>
            <tr>
                <td>/games/{id}</td>
                <td>GET</td>
                <td>JSON</td>
                <td><code>N/A</code></td>
                <td>Returns the game associated with the provided ID number</td>
            </tr>
            <tr>
                <td>/games/{name}</td>
                <td>GET</td>
                <td>JSON</td>
                <td><code>N/A</code></td>
                <td>Returns all games which contain the provided name</td>
            </tr>
            <tr>
                <td>/games/pub/{name}</td>
                <td>GET</td>
                <td>JSON</td>
                <td><code>N/A</code></td>
                <td>Returns all games which were published by the given company.</td>
            </tr>
            <tr>
                <td>/games</td>
                <td>POST</td>
                <td>JSON</td>
                <td><code>{"game_name":"Peggle", "genre":"Arcade, Puzzle", "publisher":"PopCap Games", "platforms":"PC, Xbox 360, PlayStation 3", "pegi_age":"3", "release_date":"2007-02-27", "desciption":"Do you have what it takes to become a Peggle™ Master? Take your best shot! Conquer 55 levels with 10 mystical Magic Powers and rack up bonus points. Face off against friends in 4-player Xbox LIVE® multiplayer play, and test your skills in 75 Grand Master Challenges."}</code></td>
                <td>Insert a new game into the database</td>
            </tr>
            <tr>
                <td>/games</td>
                <td>PUT</td>
                <td>JSON</td>
                <td><code>{"game_id":"22", "game_name":"Peggle", "genre":"Arcade, Puzzle", "publisher":"PopCap Games", "platforms":"PC, Xbox 360, PlayStation 3", "pegi_age":"3", "release_date":"2007-02-27", "desciption":"Do you have what it takes to become a Peggle™ Master? Take your best shot! Conquer 55 levels with 10 mystical Magic Powers and rack up bonus points. Face off against friends in 4-player Xbox LIVE® multiplayer play, and test your skills in 75 Grand Master Challenges."}</code></td>
                <td>Update the information of a game in the database</td>
            </tr>
            <tr>
                <td>/games</td>
                <td>DELETE</td>
                <td>JSON</td>
                <td><code>{"game_id" : 20}</code></td>
                <td>Remove a game from the database</td>
            </tr>
        </table>
    </body>
</html>