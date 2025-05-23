<div class="container">
    <h2>Complaints List</h2>

    <div class="table-wrapper">
        <table class="complaints-table">
        <thead class="complaints-header">
        <tr>
            <th class="complaints-header-cell">Id</th>
            <th class="complaints-header-cell">Anonymous</th>
            <th class="complaints-header-cell">Name</th>
            <th class="complaints-header-cell">Surname</th>
            <th class="complaints-header-cell">Phone</th>
            <th class="complaints-header-cell">Email</th>
            <th class="complaints-header-cell">Location</th>
            <th class="complaints-header-cell">Event Date</th>
            <th class="complaints-header-cell">Hours Range</th>
            <th class="complaints-header-cell">Details</th>
            <th class="complaints-header-cell">People</th>
            <th class="complaints-header-cell">Status</th>
            <th class="complaints-header-cell">Response</th>
            <th class="complaints-header-cell">Responser</th>
            <th class="complaints-header-cell">Action</th>
        </tr>
    </thead>
            <tbody>
                <?php if (!empty($complaints)) : ?>
                    <?php foreach ($complaints as $row): ?>
                        <tr>
                            <td class="complaints-cell"><?= esc($row['id']) ?></td>
                            <td class="complaints-cell"><?= $row['name'] !== null ? 'No' : 'Yes' ?></td>
                            <td class="complaints-cell"><?= esc($row['name']) ?></td>
                            <td class="complaints-cell"><?= esc($row['surname']) ?></td>
                            <td class="complaints-cell"><?= esc($row['phone']) ?></td>
                            <td class="complaints-cell"><?= esc($row['email']) ?></td>
                            <td class="complaints-cell"><?= esc($row['location']) ?></td>
                            <td class="complaints-cell"><?= esc($row['event_date']) ?></td>
                            <td class="complaints-cell"><?= esc($row['hours_range']) ?></td>
                            <td class="complaints-cell"><?= esc($row['complain_details']) ?></td>
                            <td class="complaints-cell"><?= esc($row['people']) ?></td>
                            <td class="complaints-cell"><?= esc($row['status']) ?></td>
                            <td class="complaints-cell"><?= esc($row['response']) ?></td>
                            <td class="complaints-cell"><?= esc($row['responser']) ?></td>
                            <td class="complaints-cell">
                                <button class="edit-button" onclick="editComplaint(<?= $row['id'] ?>)">Edit</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td class="complaints-cell no-data" colspan="14">No complaints found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
