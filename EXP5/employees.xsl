<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>Employee Details</title>
                <style>
                    table { border-collapse: collapse; width: 80%; margin: auto; }
                    th, td { border: 1px solid black; padding: 8px; text-align: left; }
                    th { background-color: #f2f2f2; }
                </style>
            </head>
            <body>
                <h2 align="center">Employee Details</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                    <xsl:for-each select="employees/employee">
                        <tr>
                            <td><xsl:value-of select="@id"/></td>
                            <td><xsl:value-of select="name"/></td>
                            <td><xsl:value-of select="position"/></td>
                            <td><xsl:value-of select="department"/></td>
                            <td><xsl:value-of select="salary"/></td>
                            <td><xsl:value-of select="contact/email"/></td>
                            <td><xsl:value-of select="contact/phone"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
