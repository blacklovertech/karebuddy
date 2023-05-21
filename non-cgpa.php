<style>
table,
th,
td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;

}
</style>
<main class="page projects-page">
    <section class="portfolio-block projects-cards">
        <div class="container">
            <div class="heading">
                <h2 style="color: var(--bs-indigo);">Non-CGPA Details</h2>
            </div>
            <div class="row">
                <div class="col-md-10 col-lg-4">
                    <details>

                        <summary>About Non-CGPA</summary>
                        <p>The Non-CGPA is a Extra Curicullar and Extra Activity Credit .
                            These Gtoup Must Be Completed Before <strong>3rd Year Completion!!</strong> </p>
                    </details>
                    <details>
                        <summary>Group In Non-CGPA</summary>
                        <ul>
                            <li>Group 1</li>
                            <li>Group 2</li>
                            <li>Group 3</li>
                        </ul>
                    </details>

                    <details>

                        <summary>Credits ??</summary>
                        <p>You Will get a Credit according to hours of Works on Courses or event or hackathon That Your
                            going to participate!! </P>
                    </details>
                    <details>

                        <summary>Certificate Submission</summary>
                        <p>
                            <li>Hard-Copy</li>
                            <li>Soft-Copy </li>
                            <li>Letter of Submission</li> To Your Department Staff i.e. Your CC or FA
                            (Class-Cordinator/Faculty-Advisor)
                            <br>
                            Submit with the proof of participation, like collage details and date ,Certificate.
                        </P>
                    </details>
                    <details>
                        <summary>
                            Time of Approval 
                        </summary>
                        <p>The all deatils will be verified by your faculty and updated on the end of each semaster !!</p>
                    </details>

                </div>
            </div><br><br>
            <div class="row" id="tab">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <th>Sl. No. </th>
                            <th>Group </th>
                            <th>Course/Activity </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td rowspan="2">I</td>
                            <td>Soft skills 1 and Soft skills 2 (or) TOEFL/IELTS/BEC, etc.,</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aptitude 1 and Aptitude 2 (or) GRE/GMAT/CAT/GATE, etc.,</td>

                        </tr>
                        <tr>
                            <td>3</td>
                            <td rowspan="3">II</td>
                            <td>NSS</td>

                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Sports</td>
                        </tr>
                        <tr>

                            <td>5</td>
                            <td>Extra-Curricular Activity
                            </td>

                        </tr>
                        <tr>
                            <td>6</td>
                            <td rowspan="3">III</td>
                            <td>Co-Curricular Activity</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Value Added Courses</td>


                        </tr>
                        <tr>
                            <td>8</td>
                            <td>International Certification (Technical)</td>

                        </tr>
                        <tr>
                            <td colspan="3"><br><input type="button" value="Create PDF" id="btPrint"
                                    onclick="createPDF()" />
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row">

            <script>
            function createPDF() {
                var sTable = document.getElementById('tab').innerHTML;

                var style = "<style>";
                style = style + "table {width: 100%;font: 17px Calibri;}";
                style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
                style = style + "padding: 2px 3px;text-align: center;}";
                style = style + "</style>";

                // CREATE A WINDOW OBJECT.
                var win = window.open('', '', 'height=700,width=700');

                win.document.write('<html><head>');
                win.document.write('<title>Profile</title>'); // <title> FOR PDF HEADER.
                win.document.write(style); // ADD STYLE INSIDE THE HEAD TAG.
                win.document.write('</head>');
                win.document.write('<body>');
                win.document.write(sTable); // THE TABLE CONTENTS INSIDE THE BODY TAG.
                win.document.write('</body></html>');

                win.document.close(); // CLOSE THE CURRENT WINDOW.

                win.print(); // PRINT THE CONTENTS.
            }
            </script>
        </div>




        </div>
    </section>
</main>