/**
 * @file
 * JavaScript API for the Content moderation edit notify module.
 *
 * May only be loaded for authenticated users on node edit form for moderated
 * content types.
 */

((Drupal, drupalSettings) => {
  const currentUserID = parseInt(drupalSettings.user.uid, 10);
  const { node } = drupalSettings.content_moderation_edit_notify[currentUserID];
  const { interval } = drupalSettings.content_moderation_edit_notify || 30;

  /**
   * @namespace
   */
  Drupal.content_moderation_edit_notify = {
    /**
     * Fetch information on this node revision.
     *
     * @param {array} node
     *   A node array with number nid and vid.
     */
    checkLastRevision() {
      if (!node.hasOwnProperty("nid") || !node.hasOwnProperty("vid")) {
        return;
      }
      Drupal.ajax({
        url: Drupal.url(
          `content_moderation_edit_notify/${node.nid}/${node.vid}/check`
        ),
      }).execute();
    },
  };

  /**
   * Registers behaviors related to the ajax request.
   */
  Drupal.behaviors.contentModerationEditNotify = {
    attach(context) {
      once("edit-notify", "form.node-form", context).forEach(() => {
        setInterval(() => {
          Drupal.content_moderation_edit_notify.checkLastRevision();
        }, interval);
      });
    },
  };
})(Drupal, drupalSettings);
