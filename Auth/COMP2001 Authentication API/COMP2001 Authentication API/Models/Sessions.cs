using System;
using System.Collections.Generic;

namespace COMP2001_Authentication_API.Models
{
    public partial class Sessions
    {
        public int SessionId { get; set; }
        public int UserId { get; set; }
        public DateTime SessionIssued { get; set; }

        public virtual Users User { get; set; }
    }
}
