<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Assigments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <main class="container py-5">
        <form action="<?= site_url("search"); ?>" method="get" class="d-flex flex-wrap align-items-center justify-content-between">
            <p class="fs-2"><?= count($assignments); ?> Assignments</p>
            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
            <div class="d-flex gap-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="easy" value="1" <?= isset($values) && isset($values["easy"]) ? "checked" : ""; ?> id="easy">
                    <label class="form-check-label" for="easy">Easy</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="intermediate" value="1" <?= isset($values) && isset($values["intermediate"]) ? "checked" : ""; ?> id="intermediate">
                    <label class="form-check-label" for="intermediate">Intermediate</label>
                </div>
            </div>
            <div>
                <select name="track" class="form-select">
                    <option value="">All</option>
<?php
                    foreach ($tracks as $track) {
?>
                    <option value="<?= $track; ?>" <?= isset($values) && $values["track"] == $track ? "selected" : ""; ?>><?= $track; ?></option>
<?php
                    }
?>
                </select>
            </div>
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
        <table class="table table-striped table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>Assignment</th>
                    <th>Sequence num</th>
                    <th>Level</th>
                    <th>Track</th>
                </tr>
            </thead>
            <tbody>
<?php
                foreach ($assignments as $assignment) {
?>
                <tr>
                    <td><?= $assignment["name"]; ?></td>
                    <td><?= $assignment["sequence_num"]; ?></td>
                    <td><?= $assignment["level"]; ?></td>
                    <td><?= $assignment["track"]; ?></td>
                </tr>
<?php
                }
?>
            </tbody>
        </table>
    </main>
</body>
</html>