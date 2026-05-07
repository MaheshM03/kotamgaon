<div role="main" class="main">
   <section class="section section-height-1 bg-primary border-0 m-15">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-6 col-xl-7 text-right text-lg-start mb-4 mb-lg-0">
               <h3 class="text-color-light text-transform-none text-5 line-height-2 line-height-lg-1 mb-1">ग्रामपंचायती दाखले / प्रमाणपत्रे</h3>
            </div>
         </div>
      </div>
   </section>

   <div class="container py-4">
      <div class="row">
         <div class="col-12">
            <div class="table-responsive">
               <table class="table table-striped table-bordered">
                  <colgroup>
                     <col style="width: 70px;">
                     <col style="width: auto;">
                     <col style="width: 140px;">
                     <col style="width: 100px;">
                     <col style="width: 220px;">
                  </colgroup>
                  <thead class="table-danger">
                     <tr>
                        <th style="font-weight: 600;">अ.क्र.</th>
                        <th style="font-weight: 600;">लोकसेवेचे नाव</th>
                        <th style="font-weight: 600;">कामकाजाचे दि.</th>
                        <th style="font-weight: 600;">प्र. फी</th>
                        <th style="font-weight: 600;">पदनिर्देशित अधिकारी</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (!empty($certificates)) : ?>
                        <?php foreach ($certificates as $index => $row) : ?>
                           <tr>
                              <td style="font-weight: 600; color: #c0392b;"><?= htmlspecialchars($row['sr']) ?></td>
                              <td><?= htmlspecialchars($row['name']) ?></td>
                              <td><?= htmlspecialchars($row['days']) ?></td>
                              <td style="<?php echo ($row['fee'] === 'निशुल्क') ? 'color: #27ae60; font-weight: 600;' : ''; ?>">
                                 <?= htmlspecialchars($row['fee']) ?>
                              </td>
                              <td><?= htmlspecialchars($row['officer']) ?></td>
                           </tr>
                        <?php endforeach; ?>
                     <?php else : ?>
                        <tr>
                           <td colspan="5" style="text-align:center; padding:24px; color:#999;">
                              माहिती उपलब्ध नाही
                           </td>
                        </tr>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>