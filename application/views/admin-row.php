<tr>
    <td>
        {player}
    </td>

    <td>
        <form action="/Admin/Delete/{player}" method="POST">
            <input type="submit" value="Delete"/>
        </form>
    </td>

    <td>
        <form action="/Admin/Adminifiy/{player}" method="POST">
            <input type="submit" value="Make Admin"/>
        </form>
    </td>
</tr>
