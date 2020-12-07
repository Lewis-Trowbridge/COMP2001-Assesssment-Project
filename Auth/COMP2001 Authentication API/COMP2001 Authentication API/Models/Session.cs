using System;
using System.Collections.Generic;

#nullable disable

namespace COMP2001_Authentication_API.Models
{
    public partial class Session
    {
        public int SessionId { get; set; }
        public int UserId { get; set; }
        public DateTime SessionIssued { get; set; }

        public virtual User User { get; set; }
    }
}
